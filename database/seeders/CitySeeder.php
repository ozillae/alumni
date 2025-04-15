<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen('database/files/city.csv', 'r');
        // City::query()->truncate();

        while(! feof($file)) {
            $item = fgetcsv($file);

            City::firstOrCreate(
                ['code' => (string) $item[1] ],
                ['name' => $item[0],
                    'province' => (int) $item[2], 
                    'active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ],
            );
        }

        fclose($file);
    }
}
