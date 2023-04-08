<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //import CSV function

    public function run()
    {
        $csvFile = fopen(base_path('database/data/ingredients.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Ingredient::create([
                    'name' => $data['0'],
                ]);
            }
            $firstline = false;
        }
    }
}
