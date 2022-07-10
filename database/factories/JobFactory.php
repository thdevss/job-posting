<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'id' => $this->faker->uuid,
            'job_type' => rand(1, 7),
            'job_degree' => rand(1, 5),
            'job_gender' => $this->faker->randomElement(['m', 'f']),
            'job_title' => $this->faker->jobTitle,
            'company_name' => $this->faker->company,
            'job_amount' => rand(1, 10),
            'company_address' => $this->faker->address,
            'job_province' => $this->faker->city,
            'telephone_number' => $this->faker->phoneNumber,
            'job_salary' => $this->faker->numberBetween(8000, 40000),
            'job_description' => $this->faker->realText
        ];
    }
}
