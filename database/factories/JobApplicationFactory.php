<?php

namespace Database\Factories;

use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationFactory extends Factory
{
    protected $model = JobApplication::class;

    public function definition(): array
    {
        return [
            'job_id' => 1, // Will be set in seeder
            'candidate_id' => 1, // Will be set in seeder
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
