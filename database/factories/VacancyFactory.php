<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    protected $model = Vacancy::class;

    public function definition(): array
    {
        return [
            'employer_id' => 1, // Will be set in seeder
            'job_title' => $this->faker->jobTitle,
            'work_location' => $this->faker->city,
            'job_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Remote']),
            'job_description' => $this->faker->paragraph(3),
            'job_requirement' => $this->faker->paragraph(2),
            'closing_date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'status' => 'published',
        ];
    }
}
