<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence;

        return [
            'user_id' => $this->faker->randomElement(User::pluck('id', 'id')->toArray()),
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => $this->faker->imageUrl(640, 480),
            'content' => $this->faker->paragraph,
            'category_id' => $this->faker->randomElement(Category::where('type', 'News')->pluck('id', 'id')->toArray()),
        ];
    }
}