<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Car;
use App\Models\Image;

class CarImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 31; $i <= 40; $i++) {
            $image = Image::find($i);
            $image->cars()->attach(Car::inRandomOrder()->get()->first());
        }
    }

}
