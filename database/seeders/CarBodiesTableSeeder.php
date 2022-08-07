<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBody;

class CarBodiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carBodyNames = ['Седан', 'Купе', 'Универсал', 'Хэтчбек'];
        for ($i = 0; $i < count($carBodyNames); $i++) {
            $carBody = CarBody::factory()->state([
                'name' => $carBodyNames[$i],
            ])->create();
        }
    }
}
