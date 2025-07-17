<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;

class ProductVariantAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ProductVariant::all() as $variant) {
            ProductVariantAttribute::create([
                'product_variant_id' => $variant->id,
                'attribute_id' => 1,
                'attribute_value_id' => 1,
            ]);
        }
    }

    
}
