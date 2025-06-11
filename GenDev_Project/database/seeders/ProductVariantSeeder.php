<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variants')->insert([
            ['id' => 1, 'product_id' => 1, 'price' => 250000, 'sale_price' => 230000, 'quantity' => 10, 'status' => 1],
            ['id' => 2, 'product_id' => 1, 'price' => 260000, 'sale_price' => 240000, 'quantity' => 8, 'status' => 1],
            ['id' => 3, 'product_id' => 1, 'price' => 270000, 'sale_price' => 250000, 'quantity' => 5, 'status' => 1],
            ['id' => 4, 'product_id' => 1, 'price' => 280000, 'sale_price' => 260000, 'quantity' => 3, 'status' => 1],
        ]);
    }
}
