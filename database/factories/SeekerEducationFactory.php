<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeekerEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_education' => $this->faker->randomElement(['S2', 'S1', 'D4', 'D3', 'D2', 'D1']),
            'major' => $this->faker->randomElement(Category::where('type', 'Major')->pluck('id', 'id')->toArray()),
            'institute_name' => ucwords($this->faker->words(3, true)),
            'graduation_year' => date('Y'),
            'gpa' => $this->faker->numerify('###'),
        ];
    }
}