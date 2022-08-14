<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_paths = ['images/test_banner_1.jpg', 'images/test_banner_2.jpg', 'images/test_banner_3.jpg'];
        for ($i = 0; $i < 3; $i++) {
            $banner = Banner::factory()->state([
                'image_path' => $image_paths[$i],
            ])->create();
        }
    }
}
