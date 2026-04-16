<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller {
    
    public function index(Request $request) {
        $user = $request->user();

        if ($user && $user->isEmployer()) {
            $jobs = $user->employer->jobs()->latest()->paginate(10);
        } else {
            $jobs = Vacancy::published()->with('employer')->latest()->paginate(10);
        }

        return response()->json($jobs);
    }

    public function store(Request $request) {
        $this->authorizeEmployer($request);

        $data = $request->validate([
            'job_title'       => 'required|string',
            'work_location'   => 'required|string',
            'job_type'        => 'required|string',
            'job_description' => 'required|string',
            'job_requirement' => 'required|string',
            'closing_date'    => 'required|date',
            'status'          => 'in:draft,published',
        ]);

        $job = $request->user()->employer->jobs()->create($data);

        return response()->json($job, 201);
    }

    public function show(Request $request, Vacancy $vacancy) {
        $user = $request->user();

        
        if (!$user || $user->isCandidate()) {
            abort_if($vacancy->status !== 'published', 403);
        }

        return response()->json($vacancy->load('employer'));
    }

    public function update(Request $request, Vacancy $vacancy) {
        $this->authorizeEmployer($request);
        abort_if($vacancy->employer_id !== $request->user()->employer->id, 403);

        $data = $request->validate([
            'job_title'       => 'sometimes|string',
            'work_location'   => 'sometimes|string',
            'job_type'        => 'sometimes|string',
            'job_description' => 'sometimes|string',
            'job_requirement' => 'sometimes|string',
            'closing_date'    => 'sometimes|date',
            'status'          => 'sometimes|in:draft,published',
        ]);

        $vacancy->update($data);

        return response()->json($vacancy);
    }

    public function destroy(Request $request, Vacancy $vacancy) {
        $this->authorizeEmployer($request);
        abort_if($vacancy->employer_id !== $request->user()->employer->id, 403);
        $vacancy->delete();
        return response()->json(['message' => 'Deleted']);
    }

    private function authorizeEmployer(Request $request) {
        abort_if(!$request->user()->isEmployer(), 403, 'Only employers allowed.');
    }
}