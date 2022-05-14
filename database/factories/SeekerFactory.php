<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeekerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->firstName,
            'logo' => $this->faker->imageUrl(200, 200),
            'date_of_birth' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')
                ->format('Y-m-d'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'marital_status' => $this->faker->randomElement(['Single', 'Married']),
            'telp' => $this->faker->numerify('##########'),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph,
        ];
    }
}