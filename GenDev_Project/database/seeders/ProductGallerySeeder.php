<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Product::all() as $product) {
            ProductGallery::create([
                'product_id' => $product->id,
                'image' => 'tshirt_side.jpg',
            ]);
            ProductGallery::create([
                'product_id' => $product->id,
                'image' => 'tshirt_back.jpg',
            ]);
        }
    }
}
