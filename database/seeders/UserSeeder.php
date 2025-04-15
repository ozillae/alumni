<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::query()->truncate();
        $usr = [
            1 => [
                'name' => 'System',
                'email' => 'supermin@domain.com',
                'user_type' => 'A',
            ],
            2 => [
                'name' => 'Staf Kantong',
                'email' => 'staf@domain.com',
                'user_type' => 'A',
            ],
            3 => [
                'name' => 'User Guest',
                'email' => 'user@domain.com',
                'user_type' => 'C',
            ],
            
            4 => [
                'name' => 'Admin Company',
                'email' => 'admincom@domain.com',
                'user_type' => 'B',
            ],
            5 => [
                'name' => 'Staf Company',
                'email' => 'stafcompany@domain.com',
                'user_type' => 'B',
            ]
        ];

        $additional =  [
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'phone' => '+6281300000'.rand(100,900),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1
        ];

        $users = array();
        foreach($usr as $item){
            $user = User::where('email', $item['email'])->first();

            if($user == null){
                $users[] = array_merge($item, $additional);
            }
        }

        if(count($users) > 0){
            DB::table('users')->insert($users);
        }
    }
}
