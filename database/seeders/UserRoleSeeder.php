<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Employer users
        User::factory()->create([
            'name' => 'PT Tech Indonesia',
            'email' => 'employer1@example.com',
            'role' => 'employer',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'CV Kreatif Solusi',
            'email' => 'employer2@example.com',
            'role' => 'employer',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Startup Inovasi',
            'email' => 'employer3@example.com',
            'role' => 'employer',
            'password' => bcrypt('password'),
        ]);

        // Candidate users
        User::factory()->create([
            'name' => 'Ahmad Santoso',
            'email' => 'candidate1@example.com',
            'role' => 'candidate',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Siti Nurhaliza',
            'email' => 'candidate2@example.com',
            'role' => 'candidate',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Budi Wijaya',
            'email' => 'candidate3@example.com',
            'role' => 'candidate',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Dewi Sartika',
            'email' => 'candidate4@example.com',
            'role' => 'candidate',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Rudi Hartono',
            'email' => 'candidate5@example.com',
            'role' => 'candidate',
            'password' => bcrypt('password'),
        ]);
    }
}
