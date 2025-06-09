<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variant_attributes')->insert([
            // Variant 1: Red - M
            ['product_variant_id' => 1, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 1, 'attribute_id' => 2, 'attribute_value_id' => 4],

            // Variant 2: Red - L
            ['product_variant_id' => 2, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 2, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Variant 3: Blue - M
            ['product_variant_id' => 3, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 3, 'attribute_id' => 2, 'attribute_value_id' => 4],

            // Variant 4: Blue - L
            ['product_variant_id' => 4, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 4, 'attribute_id' => 2, 'attribute_value_id' => 5],
        ]);
    }
}
