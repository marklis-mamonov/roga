<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = ucfirst($this->faker->unique()->words(1, true));
        $slug = Str::slug($name);
        $sort = rand(1, 100);
        return [
            'name' => $name,
            'slug' => $slug,
            'sort' => $sort,
        ];
    }
}
