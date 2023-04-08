<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //import CSV function

    public function run()
    {
        $csvFile = fopen(base_path('database/data/unit.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Unit::create([
                    'name' => $data['0'],
                ]);
            }
            $firstline = false;
        }
    }
}
