<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMiniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories_mini')->insert([
        // 'category_id'=>1,
        // 'name'=>"Iphone",
        // 'status'=>1,
        // 'image'=>'anh.jpg',
        'category_id'=>1,
        'name'=>"Samsung",
        'status'=>1,
        'image'=>'anh2.jpg'
        ]);
    }
}