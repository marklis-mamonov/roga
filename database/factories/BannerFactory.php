<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($this->faker));
        $title = ucfirst($this->faker->unique()->words(rand(1, 6), true));
        $description = $this->faker->text(150);
        $link = "/catalog/novinki";
        $imagePath = str_replace("public/storage/", "", $this->faker->image('public/storage/images', 640, 480));
        return [
            'title'       => $title,
            'description' => $description,
            'link'        => $link,
            'image_path'  => $imagePath,
        ];
    }
}
