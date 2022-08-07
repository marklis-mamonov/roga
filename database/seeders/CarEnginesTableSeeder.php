<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarEngine;

class CarEnginesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carEngineNames = ['2.0 MPI / 150 л.с. / Бензин', '1.5 MPI / 120 л.с. / Бензин', '2.5 MPI / 180 л.с. / Бензин', '1.2 MPI / 100 л.с. / Дизель'];
        for ($i = 0; $i < count($carEngineNames); $i++) {
            $carEngine = CarEngine::factory()->state([
                'name' => $carEngineNames[$i],
            ])->create();
        }
    }
}
