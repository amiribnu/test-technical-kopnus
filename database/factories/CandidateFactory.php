<?php

namespace Database\Factories;


use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition(): array
    {
        return [
            'user_id' => 1, 
            'candidate_name' => $this->faker->name,
            'candidate_email' => $this->faker->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'candidate_gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'candidate_address' => $this->faker->address,
            'candidate_cv' => $this->faker->word . '.pdf',
            'portofolio_link' => $this->faker->url,
        ];
    }
}
