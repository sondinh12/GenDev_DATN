<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Product::all() as $product) {
            ProductVariant::create([
                'product_id' => $product->id,
                'price' => 250000,
                'sale_price' => 230000,
                'quantity' => 10,
                'status' => 1,
                // ... các trường khác nếu có
            ]);
            // Thêm các variant khác nếu muốn
        }
    }
}
