<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentNames = ['Легковые', 'Внедорожники', 'Раритетные', 'Распродажа', 'Новинки'];
        $parentChildrenCount = [5, 3, null, null, null];
        $childrenNames = ['Седаны', 'Хетчбеки', 'Универсалы', 'Купе', 'Родстеры', 'Рамные', 'Пикапы', 'Кроссоверы'];
        $childrenFlag = 0;
        for ($i = 0; $i < count($parentNames); $i++) {
            $car = Category::factory()->state([
                'name' => $parentNames[$i],
                'slug' => Str::slug($parentNames[$i]),
                'sort' => $i + 1 + $childrenFlag,
            ])->create();
            if ($parentChildrenCount[$i]) {
                for ($j = $childrenFlag; $j < $childrenFlag + $parentChildrenCount[$i]; $j++) {
                    $car->children()->create([
                        'name' => $childrenNames[$j],
                        'slug' => Str::slug($childrenNames[$j]),
                        'sort' => $j + $i + 2,
                    ]);
                }
                $childrenFlag += $parentChildrenCount[$i];
            }
        }
    }
}
