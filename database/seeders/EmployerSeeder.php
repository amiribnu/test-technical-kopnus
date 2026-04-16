<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    public function run(): void
    {
        $employerUsers = User::where('role', 'employer')->get();
        
        foreach ($employerUsers as $user) {
            Employer::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}

