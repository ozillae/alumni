<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen('database/files/province.csv', 'r');
        // Province::query()->truncate();

        while(! feof($file)) {
            $item = fgetcsv($file);

            Province::firstOrCreate(
                ['code' => (string) $item[1] ],
                ['name' => $item[0],
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
