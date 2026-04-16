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
            'job_id' => 1, 
            'candidate_id' => 1, 
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
