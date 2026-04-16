<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller {
    
    public function index(Request $request, Vacancy $vacancies) {
        abort_if(!$request->user()->isEmployer(), 403);
        abort_if($vacancies->employer_id !== $request->user()->employer->id, 403);

        $applications = $vacancies->jobApplications()->with('candidate')->paginate(10);

        return response()->json($applications);
    }

    
    public function store(Request $request, Vacancy $vacancies) {
        abort_if(!$request->user()->isCandidate(), 403);
        abort_if($vacancies->status !== 'published', 422, 'Job is not published.');

        $candidate = $request->user()->candidate;
        abort_if(!$candidate->candidate_cv, 422, 'Upload your CV first.');

        
        $alreadyApplied = JobApplication::where('job_id', $vacancies->id)
            ->where('candidate_id', $candidate->id)
            ->exists();

        abort_if($alreadyApplied, 422, 'Already applied.');

        $application = JobApplication::create([
            'job_id'       => $vacancies->id,
            'candidate_id' => $candidate->id,
            'status'       => 'pending',
        ]);

        return response()->json($application, 201);
    }

    
    public function update(Request $request, JobApplication $application) {
        abort_if(!$request->user()->isEmployer(), 403);
        abort_if(
            $application->vacancy->employer_id !== $request->user()->employer->id,
            403
        );

        $data = $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $application->update($data);

        return response()->json($application);
    }
}