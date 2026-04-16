<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        $candidateUsers = User::where('role', 'candidate')->get();
        
        foreach ($candidateUsers as $user) {
            Candidate::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}

