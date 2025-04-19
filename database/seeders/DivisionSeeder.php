<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            [
                'code' => 'TI',
                'name' => 'Teknik Industri',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
                'description' => 'Kelompok Teknik Industri.',
            ],
            [
                'code' => 'KI',
                'name' => 'Komputer dan Informatika',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
                'description' => 'Kelompok IT infrastructure and software development.',
            ],
            [
                'code' => 'TS',
                'name' => 'Teknik Sipil',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
                'description' => 'Jurusan Teknik Sipil.',
            ],
        ];

        foreach ($divisions as $division) {
            DB::table('divisions')->updateOrInsert(
                ['code' => $division['code']],
                $division
            );
        }
    }
}
