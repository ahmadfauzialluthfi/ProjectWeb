<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'name' => 'Lemon',
                'description' => 'Segar & berenergi',
                'price' => 10000,
                'image' => 'lemon.png',
            ],
            [
                'name' => 'Jeruk',
                'description' => 'Manis alami',
                'price' => 12000,
                'image' => 'jeruk.png',
            ],
            [
                'name' => 'Mangga',
                'description' => 'Kaya rasa',
                'price' => 15000,
                'image' => 'mangga.png',
            ],
            [
                'name' => 'Mix',
                'description' => 'Paling laris',
                'price' => 18000,
                'image' => 'mix.png',
            ],
        ]);
    }
}
