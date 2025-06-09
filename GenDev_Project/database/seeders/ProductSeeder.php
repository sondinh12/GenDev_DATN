<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Iphone 14',
            'image' => 'tshirt.jpg',
            'status' => 1,
            'description' => 'A stylish sports t-shirt',
            'category_id' => 1
        ]);
    }
}
