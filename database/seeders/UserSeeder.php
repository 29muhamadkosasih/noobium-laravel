<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Muhamad Kosasih',
                'email' => 'muha@gmail.com',
                'password' => bcrypt('password'),
                'picture' => env('AVATAR_GENERATOR_URL'). 'Muhamad Kosasih',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Abdul',
                'email' => 'ab@gmail.com',
                'password' => bcrypt('password'),
                'picture' => env('AVATAR_GENERATOR_URL'). 'Abdul',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
