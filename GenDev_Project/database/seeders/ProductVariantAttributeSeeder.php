<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantAttributeSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('product_variant_attributes')->truncate();
        DB::table('product_variant_attributes')->insert([
            // iPhone 15 Pro Max - 4 biến thể
            ['product_variant_id' => 1, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 1, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 2, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 2, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 3, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 3, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 4, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 4, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Samsung Galaxy S24 Ultra - 4 biến thể
            ['product_variant_id' => 5, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 5, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 6, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 6, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 7, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 7, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 8, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 8, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Asus Vivobook 16 - 4 biến thể
            ['product_variant_id' => 9, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 9, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 10, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 10, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 11, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 11, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 12, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 12, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Dell XPS 13 - 4 biến thể
            ['product_variant_id' => 13, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 13, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 14, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 14, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 15, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 15, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 16, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 16, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Tai Nghe Lenovo - 4 biến thể
            ['product_variant_id' => 17, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 17, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 18, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 18, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 19, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 19, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 20, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 20, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Sạc dự phòng Baseus - 4 biến thể
            ['product_variant_id' => 21, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 21, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 22, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 22, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 23, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 23, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 24, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 24, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // iPad Air (M3) - 4 biến thể
            ['product_variant_id' => 25, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 25, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 26, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 26, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 27, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 27, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 28, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 28, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Samsung Galaxy Tab S9 - 4 biến thể
            ['product_variant_id' => 29, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 29, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 30, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 30, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 31, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 31, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 32, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 32, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Tivi Sony 4K - 4 biến thể
            ['product_variant_id' => 33, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 33, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 34, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 34, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 35, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 35, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 36, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 36, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Tivi LG 55 inch - 4 biến thể
            ['product_variant_id' => 37, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 37, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 38, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 38, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 39, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 39, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 40, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 40, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Loa Bluetooth JBL - 4 biến thể
            ['product_variant_id' => 41, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 41, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 42, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 42, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 43, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 43, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 44, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 44, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Loa Bluetooth Cyboris - 4 biến thể
            ['product_variant_id' => 45, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 45, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 46, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 46, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 47, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 47, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 48, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 48, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Máy ảnh Lomo - 4 biến thể
            ['product_variant_id' => 49, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 49, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 50, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 50, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 51, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 51, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 52, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 52, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Instax Mini 12 - 4 biến thể
            ['product_variant_id' => 53, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 53, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 54, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 54, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 55, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 55, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 56, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 56, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // HUAWEI watch fit 3 - 4 biến thể
            ['product_variant_id' => 57, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 57, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 58, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 58, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 59, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 59, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 60, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 60, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Đồng hồ Xiaomi Smart - 4 biến thể
            ['product_variant_id' => 61, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 61, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 62, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 62, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 63, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 63, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 64, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 64, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // TP-Link Router Wi-Fi 4G - 4 biến thể
            ['product_variant_id' => 65, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 65, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 66, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 66, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 67, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 67, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 68, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 68, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Switch TP-Link 8-Port - 4 biến thể
            ['product_variant_id' => 69, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 69, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 70, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 70, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 71, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 71, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 72, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 72, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Máy in laser CANON - 4 biến thể
            ['product_variant_id' => 73, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 73, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 74, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 74, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 75, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 75, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 76, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 76, 'attribute_id' => 2, 'attribute_value_id' => 5],

            // Máy in Epson L3250 - 4 biến thể
            ['product_variant_id' => 77, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 77, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 78, 'attribute_id' => 1, 'attribute_value_id' => 1],
            ['product_variant_id' => 78, 'attribute_id' => 2, 'attribute_value_id' => 5],
            ['product_variant_id' => 79, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 79, 'attribute_id' => 2, 'attribute_value_id' => 4],
            ['product_variant_id' => 80, 'attribute_id' => 1, 'attribute_value_id' => 2],
            ['product_variant_id' => 80, 'attribute_id' => 2, 'attribute_value_id' => 5],

        ]);
    }
}