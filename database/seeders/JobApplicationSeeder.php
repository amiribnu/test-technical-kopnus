<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use App\Models\Vacancy;
use App\Models\Candidate;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $vacancies = Vacancy::all();
        $candidates = Candidate::all();
        
        foreach ($vacancies as $vacancy) {
            $appliedCandidates = $candidates->random(min(3, $candidates->count()));
            foreach ($appliedCandidates as $candidate) {
                JobApplication::factory()->create([
                    'job_id' => $vacancy->id,
                    'candidate_id' => $candidate->id,
                ]);
            }
        }
    }
}

