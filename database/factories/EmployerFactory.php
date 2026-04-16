<?php

namespace Database\Factories;


use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition(): array
    {
        return [
            'user_id' => 1, 
            'company_name' => $this->faker->company,
            'company_address' => $this->faker->address,
            'company_phone' => $this->faker->phoneNumber,
        ];
    }
}
