<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->upsert([
            ['id' => 1, 'active' => 1, 'image' => '', 'name' => 'Уголь',    'link' => 'coal'],
            ['id' => 2, 'active' => 1, 'image' => '', 'name' => 'Дрова',    'link' => 'firewood'],
            ['id' => 3, 'active' => 1, 'image' => '', 'name' => 'Перегной', 'link' => 'humus'],
            ['id' => 4, 'active' => 1, 'image' => '', 'name' => 'Зерновые', 'link' => 'cereals'],
            ['id' => 5, 'active' => 1, 'image' => '', 'name' => 'Грибы',    'link' => 'mushrooms'],
            ['id' => 6, 'active' => 1, 'image' => '', 'name' => 'Бобовые',  'link' => 'legumes'],
            ['id' => 7, 'active' => 1, 'image' => '', 'name' => 'Семена',   'link' => 'seeds'],
        ], ['id']);
    }
}
