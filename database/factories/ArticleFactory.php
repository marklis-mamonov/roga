<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->text(rand(5, 100));
        $slug = Str::slug($title);
        $description = $this->faker->text(255);
        $body = $this->faker->text();
        return [
            'slug'         => $slug,
            'title'        => $title,
            'description'  => $description,
            'body'         => $body
        ];
    }
}
