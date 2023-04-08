<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //import CSV function

    public function run()
    {
        $csvFile = fopen(base_path('database/data/recipes.csv'), 'r');
        // excel loader
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Recipe::create([
                    'name' => $data['0'],
                    'description' => $data['1'],
                    'instructions' => $data['2'],
                    'tags' => explode(',', $data['3']),
                ]);
            }
            $firstline = false;
        }
    }
}
