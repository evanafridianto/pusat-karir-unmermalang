<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = ucwords($this->faker->words(2, true));

        return [
            'employer_id' => $this->faker->randomElement(User::pluck('id', 'id')->toArray()),
            'job_title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph,
            'job_type' => $this->faker->randomElement(['Permanent-employment', 'Fixed-term', 'Part-time', 'Outsourcing', 'Internship']),
            'expiry_date' => Carbon::now()->addDays(10),
        ];
    }
}