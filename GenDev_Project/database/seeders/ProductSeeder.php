<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            // có thể bật nếu sản phẩm 0 biến thể
            'sale_price'=>3000,
            'price'=>4000,
            'quantity'=>3,
            'status' => 1,
            'description' => 'A stylish sports t-shirt',
            'category_id' => 1
        ]);
    }
}
