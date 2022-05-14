<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Vacancy;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'province_id' => $this->faker->randomElement(Province::pluck('id', 'id')->toArray()),
            'city_id' => $this->faker->randomElement(City::pluck('id', 'id')->toArray()),
            'street' => $this->faker->unique()->sentence,
            'zip_code' => $this->faker->numerify('##########'),
            'addressable_id' => $this->faker->unique()->randomElement(Vacancy::pluck('id', 'id')->toArray()),
            'addressable_type' => 'App\Models\Vacancy',
        ];
    }
}