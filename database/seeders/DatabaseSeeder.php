<?php

namespace Database\Seeders;

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
        $this->call([
            AdminUserSeeder::class,
            UnitSeeder::class,
            RecipeSeeder::class,
            IngredientSeeder::class,
            RecipeIngredientSeeder::class,
            VideoSeeder::class,
        ]);
    }
}
