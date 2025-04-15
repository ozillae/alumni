<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $members = [
            [
                'code' => 'M001',
                'name' => 'Member 1',
                'address' => '123 Main Street',
                'phone' => '081234567890',
                'email' => 'member1@example.com',
                'title_front' => 'Dr.',
                'title_back' => 'PhD',
                'file_profil' => 'profile1.jpg',
                'province' => '11',
                'city' => 7,
                'status' => 1,
                'joint_date' => '2023-01-01',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
                'description' => 'First member description',
            ],
            [
                'code' => 'M002',
                'name' => 'Member 2',
                'address' => '456 Elm Street',
                'phone' => '081234567891',
                'email' => 'member2@example.com',
                'title_front' => null,
                'title_back' => 'MSc',
                'file_profil' => 'profile2.jpg',
                'province' => '32',
                'city' => 161,
                'status' => 2,
                'joint_date' => '2023-02-01',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
                'description' => 'Second member description',
            ],
            // Add more members as needed
        ];

        DB::table('members')->insert($members);
    }
}
