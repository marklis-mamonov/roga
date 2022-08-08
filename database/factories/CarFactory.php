<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CarClass;
use App\Models\CarBody;
use App\Models\CarEngine;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = ucfirst($this->faker->unique()->words(rand(1, 3), true));
        $body = $this->faker->text(200);
        $price = $this->faker->numberBetween(100000, 5000000);
        $old_price = (rand(0, 1)) ? $price + $price * rand(2, 20) / 100 : null;
        $salon = $this->faker->text(200);
        $kpp = $this->faker->text(200);
        $year = $this->faker->numberBetween(2020, 2022);
        $color = $this->faker->words(1, true);
        if ($year == 2022) {
            $is_new = 1;
        } else {
            $is_new = 0;
        }

        return [
            'name'          => $name,
            'body'          => $body,
            'price'         => $price,
            'old_price'     => $old_price,
            'salon'         => $salon,
            'car_class_id'  => CarClass::factory(),
            'kpp'           => $kpp,
            'year'          => $year,
            'color'         => $color,
            'car_body_id'   => CarBody::factory(),
            'car_engine_id' => CarEngine::factory(),
            'is_new'        => $is_new,
        ];
    }
}
