<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variant_attributes')->insert([
            // iPhone 15 Pro Max - 4 biến thể
            ['product_variant_id' => 1, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 1, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 2, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 2, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 3, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 3, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 4, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 4, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPhone 15 Plus - 4 biến thể
            ['product_variant_id' => 5, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 5, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 6, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 6, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 7, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 7, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 8, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 8, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPhone 13 - 4 biến thể
            ['product_variant_id' => 9, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 9, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 10, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 10, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 11, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 11, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 12, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 12, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPhone 11 - 4 biến thể
            ['product_variant_id' => 13, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 13, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 14, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 14, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 15, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 15, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 16, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 16, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPhone 12 - 4 biến thể
            ['product_variant_id' => 17, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 17, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 18, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 18, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 19, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 19, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 20, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 20, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPhone 14 Pro Max - 4 biến thể
            ['product_variant_id' => 21, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 21, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 22, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 22, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 23, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 23, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 24, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 24, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPhone 14 - 4 biến thể
            ['product_variant_id' => 25, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 25, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 26, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 26, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 27, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 27, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 28, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 28, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPhone 14 Plus - 4 biến thể
            ['product_variant_id' => 29, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 29, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 30, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 30, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 31, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 31, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 32, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 32, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Lenovo Ideapad3 15ITL6 - 4 biến thể
            ['product_variant_id' => 33, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 33, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 34, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 34, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 35, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 35, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 36, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 36, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Lenovo Ideapad3 15IAU7 - 4 biến thể
            ['product_variant_id' => 37, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 37, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 38, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 38, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 39, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 39, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 40, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 40, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Lenovo Ideapad1 R7 - 4 biến thể
            ['product_variant_id' => 41, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 41, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 42, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 42, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 43, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 43, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 44, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 44, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Lenovo Ideapad5 - 4 biến thể
            ['product_variant_id' => 45, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 45, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 46, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 46, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 47, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 47, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 48, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 48, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Asus TUF Gaming F15 - 4 biến thể
            ['product_variant_id' => 49, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 49, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 50, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 50, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 51, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 51, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 52, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 52, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Asus Vivobook 16 - 4 biến thể
            ['product_variant_id' => 53, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 53, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 54, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 54, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 55, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 55, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 56, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 56, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Asus TUF Gaming A15 - 4 biến thể
            ['product_variant_id' => 57, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 57, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 58, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 58, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 59, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 59, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 60, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 60, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Asus Vivobook S 14 Flip - 4 biến thể
            ['product_variant_id' => 61, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 61, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 62, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 62, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 63, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 63, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 64, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 64, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // OPPO Pad Neo WiFi - 4 biến thể
            ['product_variant_id' => 65, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 65, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 66, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 66, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 67, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 67, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 68, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 68, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Samsung Galaxy Tab A9+ - 4 biến thể
            ['product_variant_id' => 69, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 69, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 70, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 70, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 71, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 71, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 72, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 72, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Honor Pad X9 - 4 biến thể
            ['product_variant_id' => 73, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 73, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 74, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 74, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 75, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 75, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 76, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 76, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Samsung Galaxy Tab A9 - 4 biến thể
            ['product_variant_id' => 77, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 77, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 78, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 78, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 79, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 79, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 80, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 80, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPad 9 WiFi - 4 biến thể
            ['product_variant_id' => 81, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 81, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 82, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 82, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 83, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 83, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 84, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 84, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPad Air 5 M1 WiFi - 4 biến thể
            ['product_variant_id' => 85, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 85, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 86, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 86, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 87, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 87, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 88, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 88, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // iPad 10 WiFi - 4 biến thể
            ['product_variant_id' => 89, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 89, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 90, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 90, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 91, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 91, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 92, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 92, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Lenovo Tab M10 (Gen3) - 4 biến thể
            ['product_variant_id' => 93, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 93, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 94, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 94, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 95, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 95, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 96, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 96, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Wireless Bluetooth Headphone - 4 biến thể
            ['product_variant_id' => 97, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 97, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 98, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 98, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 99, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 99, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 100, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 100, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Solo3 Wireless On-Ear Headphones - 4 biến thể
            ['product_variant_id' => 101, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 101, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 102, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 102, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 103, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 103, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 104, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 104, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // Vifa Portable Wireless Speaker - 4 biến thể
            ['product_variant_id' => 105, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 105, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 106, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 106, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 107, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 107, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 108, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 108, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB

            // G951s Pink Stereo Gaming Headset - 4 biến thể
            ['product_variant_id' => 109, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 109, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 110, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variant_id' => 110, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
            ['product_variant_id' => 111, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 111, 'attribute_id' => 2, 'attribute_value_id' => 4], // Capacity: 32GB
            ['product_variant_id' => 112, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variant_id' => 112, 'attribute_id' => 2, 'attribute_value_id' => 5], // Capacity: 64GB
        ]);
    }
}
