<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarClass;

class CarClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carClassNames = ['Бизнес-класс и представительский класс', 'Семейный класс', 'Гольф-класс', 'Компактный класс'];
        for ($i = 0; $i < count($carClassNames); $i++) {
            $carClass = CarClass::factory()->state([
                'name' => $carClassNames[$i],
            ])->create();
        }
    }
}
