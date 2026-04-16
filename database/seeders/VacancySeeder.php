<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use App\Models\Employer;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    public function run(): void
    {
        $employers = Employer::all();
        
        foreach ($employers as $employer) {
            Vacancy::factory()->count(3)->create([
                'employer_id' => $employer->id,
            ]);
        }
    }
}

