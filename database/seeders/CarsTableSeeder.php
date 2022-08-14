<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarClass;
use App\Models\CarBody;
use App\Models\CarEngine;
use App\Models\category;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salon = ['Черный, Натуральная кожа (WK)', 'Белый, Натуральная кожа (WK)', 'Коричневый, Натуральная кожа (WK)'];
        $carClasses = CarClass::get();
        $kpp = ['Автомат, 6 AT', 'Автомат, 6 AМT', 'Механика, MMT4'];
        $color = ['Чёрный', 'Белый', 'Красный', 'Синий', 'Зелёный'];
        $carBodies = CarBody::get();
        $carBodies->push(null);
        $carEngines = CarEngine::get();
        $categories = Category::get();
        for ($i = 0; $i < 20; $i++) {
            $car = Car::factory()->state([
                'salon' => $salon[array_rand($salon)],
                'car_class_id' => $carClasses->random(),
                'kpp' => $kpp[array_rand($kpp)],
                'color' => $color[array_rand($color)],
                'car_body_id' => $carBodies->random(),
                'car_engine_id' => $carEngines->random(),
                'category_id' => $categories->random(),
                'image_id' => $i + 11,
            ])->create();
        }
    }
}
