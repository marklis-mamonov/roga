<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticlesTableSeeder::class);
        $this->call(CarBodiesTableSeeder::class);
        $this->call(CarClassesTableSeeder::class);
        $this->call(CarEnginesTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TaggablesTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
