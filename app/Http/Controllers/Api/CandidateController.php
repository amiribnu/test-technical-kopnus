<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller {
    public function show(Request $request) {
        $candidate = $request->user()->candidate;
        abort_if(!$candidate, 404);
        return response()->json($candidate);
    }

    public function update(Request $request) {
        $candidate = $request->user()->candidate;
        abort_if(!$candidate, 404);

        $data = $request->validate([
            'candidate_name'    => 'sometimes|string',
            'phone_number'      => 'sometimes|string',
            'date_of_birth'     => 'sometimes|date',
            'candidate_gender'  => 'sometimes|string',
            'candidate_address' => 'sometimes|string',
            'portofolio_link'   => 'sometimes|url|nullable',
            'candidate_cv'      => 'sometimes|file|mimes:pdf,doc,docx|max:5120',
        ]);

        
        if ($request->hasFile('candidate_cv')) {
            if ($candidate->candidate_cv) {
                Storage::disk('public')->delete($candidate->candidate_cv);
            }
            $data['candidate_cv'] = $request->file('candidate_cv')
                ->store('cvs', 'public');
        }

        $candidate->update($data);

        return response()->json($candidate);
    }
}