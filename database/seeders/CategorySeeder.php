<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Startup',
                'slug' => 'startup',
            ],
            [
                'name' => 'Life',
                'slug' => 'life',
            ],
            [
                'name' => 'Life Leasons',
                'slug' => 'life-leasons',
            ],
            [
                'name' => 'Politic',
                'slug' => 'politic',
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
            ],
            [
                'name' => 'Poetry',
                'slug' => 'poetry',
            ],
            [
                'name' => 'Entrepreneruship',
                'slug' => 'entrepreneruship',
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
            ],
            [
                'name' => 'Healthy',
                'slug' => 'healthy',
            ],
            [
                'name' => 'Love',
                'slug' => 'love',
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
            ],
            [
                'name' => 'Writing',
                'slug' => 'writing',
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
            ],
        ]);
    }
}
