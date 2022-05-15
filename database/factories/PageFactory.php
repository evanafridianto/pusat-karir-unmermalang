<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = ucfirst(ucwords($this->faker->unique()->words(2, true)));
        return [
            'name' => $name,
            'title' => $this->faker->unique()->sentence,
            'slug' => Str::slug($name),
            'content' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(1920, 800),
            'carousel' => 1,
            'status' => 'active'
        ];
    }
}