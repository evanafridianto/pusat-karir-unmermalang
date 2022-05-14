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
        $prov =  $this->faker->randomElement(Province::pluck('id', 'id')->toArray());
        return [
            'province_id' => $prov,
            'city_id' => $this->faker->randomElement(City::where('province_id', $prov)->pluck('id', 'id')->toArray()),
            'street' => $this->faker->unique()->sentence,
            'zip_code' => $this->faker->numerify('##########'),
        ];
    }
}