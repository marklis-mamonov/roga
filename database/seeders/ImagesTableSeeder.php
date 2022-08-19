<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagesCreate = Image::factory()->count(40)->create();

        $imagePaths = ['images/test_banner_1.jpg', 'images/test_banner_2.jpg', 'images/test_banner_3.jpg'];
        for ($i = 0; $i < 3; $i++) {
            $image = Image::factory()->state([
                'path' => $imagePaths[$i],
            ])->create();
        }
    }
}
