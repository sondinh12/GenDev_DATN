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
            // iPhone 15 Pro Max - 4 biến thể
            ['id' => 1, 'product_id' => 9, 'price' => 30990000, 'sale_price' => 28990000, 'quantity' => 20, 'status' => 1], // Red-32GB
            ['id' => 2, 'product_id' => 9, 'price' => 31990000, 'sale_price' => 29990000, 'quantity' => 15, 'status' => 1], // Red-64GB
            ['id' => 3, 'product_id' => 9, 'price' => 31490000, 'sale_price' => 29490000, 'quantity' => 18, 'status' => 1], // Blue-32GB
            ['id' => 4, 'product_id' => 9, 'price' => 32490000, 'sale_price' => 30490000, 'quantity' => 12, 'status' => 1], // Blue-64GB

            // iPhone 15 Plus - 4 biến thể
            ['id' => 5, 'product_id' => 10, 'price' => 23690000, 'sale_price' => 21990000, 'quantity' => 25, 'status' => 1], // Red-32GB
            ['id' => 6, 'product_id' => 10, 'price' => 24690000, 'sale_price' => 22990000, 'quantity' => 20, 'status' => 1], // Red-64GB
            ['id' => 7, 'product_id' => 10, 'price' => 24190000, 'sale_price' => 22490000, 'quantity' => 22, 'status' => 1], // Blue-32GB
            ['id' => 8, 'product_id' => 10, 'price' => 25190000, 'sale_price' => 23490000, 'quantity' => 18, 'status' => 1], // Blue-64GB

            // iPhone 13 - 4 biến thể
            ['id' => 9, 'product_id' => 11, 'price' => 15290000, 'sale_price' => 13990000, 'quantity' => 20, 'status' => 1], // Red-32GB
            ['id' => 10, 'product_id' => 11, 'price' => 16290000, 'sale_price' => 14990000, 'quantity' => 15, 'status' => 1], // Red-64GB
            ['id' => 11, 'product_id' => 11, 'price' => 15790000, 'sale_price' => 14490000, 'quantity' => 18, 'status' => 1], // Blue-32GB
            ['id' => 12, 'product_id' => 11, 'price' => 16790000, 'sale_price' => 15490000, 'quantity' => 12, 'status' => 1], // Blue-64GB

            // iPhone 11 - 4 biến thể
            ['id' => 13, 'product_id' => 12, 'price' => 9990000, 'sale_price' => 8990000, 'quantity' => 15, 'status' => 1], // Red-32GB
            ['id' => 14, 'product_id' => 12, 'price' => 10990000, 'sale_price' => 9990000, 'quantity' => 12, 'status' => 1], // Red-64GB
            ['id' => 15, 'product_id' => 12, 'price' => 10490000, 'sale_price' => 9490000, 'quantity' => 13, 'status' => 1], // Blue-32GB
            ['id' => 16, 'product_id' => 12, 'price' => 11490000, 'sale_price' => 10490000, 'quantity' => 10, 'status' => 1], // Blue-64GB

            // iPhone 12 - 4 biến thể
            ['id' => 17, 'product_id' => 13, 'price' => 12090000, 'sale_price' => 10990000, 'quantity' => 20, 'status' => 1], // Red-32GB
            ['id' => 18, 'product_id' => 13, 'price' => 13090000, 'sale_price' => 11990000, 'quantity' => 15, 'status' => 1], // Red-64GB
            ['id' => 19, 'product_id' => 13, 'price' => 12590000, 'sale_price' => 11490000, 'quantity' => 18, 'status' => 1], // Blue-32GB
            ['id' => 20, 'product_id' => 13, 'price' => 13590000, 'sale_price' => 12490000, 'quantity' => 12, 'status' => 1], // Blue-64GB

            // iPhone 14 Pro Max - 4 biến thể
            ['id' => 21, 'product_id' => 14, 'price' => 27390000, 'sale_price' => 25490000, 'quantity' => 10, 'status' => 1], // Red-32GB
            ['id' => 22, 'product_id' => 14, 'price' => 28390000, 'sale_price' => 26490000, 'quantity' => 8, 'status' => 1], // Red-64GB
            ['id' => 23, 'product_id' => 14, 'price' => 27890000, 'sale_price' => 25990000, 'quantity' => 9, 'status' => 1], // Blue-32GB
            ['id' => 24, 'product_id' => 14, 'price' => 28890000, 'sale_price' => 26990000, 'quantity' => 6, 'status' => 1], // Blue-64GB

            // iPhone 14 - 4 biến thể
            ['id' => 25, 'product_id' => 15, 'price' => 17990000, 'sale_price' => 16490000, 'quantity' => 15, 'status' => 1], // Red-32GB
            ['id' => 26, 'product_id' => 15, 'price' => 18990000, 'sale_price' => 17490000, 'quantity' => 12, 'status' => 1], // Red-64GB
            ['id' => 27, 'product_id' => 15, 'price' => 18490000, 'sale_price' => 16990000, 'quantity' => 13, 'status' => 1], // Blue-32GB
            ['id' => 28, 'product_id' => 15, 'price' => 19490000, 'sale_price' => 17990000, 'quantity' => 10, 'status' => 1], // Blue-64GB

            // iPhone 14 Plus - 4 biến thể
            ['id' => 29, 'product_id' => 16, 'price' => 20090000, 'sale_price' => 18490000, 'quantity' => 8, 'status' => 1], // Red-32GB
            ['id' => 30, 'product_id' => 16, 'price' => 21090000, 'sale_price' => 19490000, 'quantity' => 6, 'status' => 1], // Red-64GB
            ['id' => 31, 'product_id' => 16, 'price' => 20590000, 'sale_price' => 18990000, 'quantity' => 7, 'status' => 1], // Blue-32GB
            ['id' => 32, 'product_id' => 16, 'price' => 21590000, 'sale_price' => 19990000, 'quantity' => 5, 'status' => 1], // Blue-64GB

            // Lenovo Ideapad3 15ITL6 - 4 biến thể
            ['id' => 33, 'product_id' => 1, 'price' => 10090000, 'sale_price' => 8990000, 'quantity' => 15, 'status' => 1], // Red-32GB
            ['id' => 34, 'product_id' => 1, 'price' => 11090000, 'sale_price' => 9990000, 'quantity' => 12, 'status' => 1], // Red-64GB
            ['id' => 35, 'product_id' => 1, 'price' => 10590000, 'sale_price' => 9490000, 'quantity' => 13, 'status' => 1], // Blue-32GB
            ['id' => 36, 'product_id' => 1, 'price' => 11590000, 'sale_price' => 10490000, 'quantity' => 10, 'status' => 1], // Blue-64GB

            // Lenovo Ideapad3 15IAU7 - 4 biến thể
            ['id' => 37, 'product_id' => 2, 'price' => 13190000, 'sale_price' => 11990000, 'quantity' => 12, 'status' => 1], // Red-32GB
            ['id' => 38, 'product_id' => 2, 'price' => 14190000, 'sale_price' => 12990000, 'quantity' => 10, 'status' => 1], // Red-64GB
            ['id' => 39, 'product_id' => 2, 'price' => 13690000, 'sale_price' => 12490000, 'quantity' => 11, 'status' => 1], // Blue-32GB
            ['id' => 40, 'product_id' => 2, 'price' => 14690000, 'sale_price' => 13490000, 'quantity' => 8, 'status' => 1], // Blue-64GB

            // Lenovo Ideapad1 R7 - 4 biến thể
            ['id' => 41, 'product_id' => 3, 'price' => 13490000, 'sale_price' => 12490000, 'quantity' => 10, 'status' => 1], // Red-32GB
            ['id' => 42, 'product_id' => 3, 'price' => 14490000, 'sale_price' => 13490000, 'quantity' => 8, 'status' => 1], // Red-64GB
            ['id' => 43, 'product_id' => 3, 'price' => 13990000, 'sale_price' => 12990000, 'quantity' => 9, 'status' => 1], // Blue-32GB
            ['id' => 44, 'product_id' => 3, 'price' => 14990000, 'sale_price' => 13990000, 'quantity' => 6, 'status' => 1], // Blue-64GB

            // Lenovo Ideapad5 - 4 biến thể
            ['id' => 45, 'product_id' => 4, 'price' => 16990000, 'sale_price' => 15490000, 'quantity' => 8, 'status' => 1], // Red-32GB
            ['id' => 46, 'product_id' => 4, 'price' => 17990000, 'sale_price' => 16490000, 'quantity' => 6, 'status' => 1], // Red-64GB
            ['id' => 47, 'product_id' => 4, 'price' => 17490000, 'sale_price' => 15990000, 'quantity' => 7, 'status' => 1], // Blue-32GB
            ['id' => 48, 'product_id' => 4, 'price' => 18490000, 'sale_price' => 16990000, 'quantity' => 5, 'status' => 1], // Blue-64GB

            // Asus TUF Gaming F15 - 4 biến thể
            ['id' => 49, 'product_id' => 5, 'price' => 15990000, 'sale_price' => 14490000, 'quantity' => 6, 'status' => 1], // Red-32GB
            ['id' => 50, 'product_id' => 5, 'price' => 16990000, 'sale_price' => 15490000, 'quantity' => 5, 'status' => 1], // Red-64GB
            ['id' => 51, 'product_id' => 5, 'price' => 16490000, 'sale_price' => 14990000, 'quantity' => 6, 'status' => 1], // Blue-32GB
            ['id' => 52, 'product_id' => 5, 'price' => 17490000, 'sale_price' => 15990000, 'quantity' => 4, 'status' => 1], // Blue-64GB

            // Asus Vivobook 16 - 4 biến thể
            ['id' => 53, 'product_id' => 6, 'price' => 15990000, 'sale_price' => 14490000, 'quantity' => 5, 'status' => 1], // Red-32GB
            ['id' => 54, 'product_id' => 6, 'price' => 16990000, 'sale_price' => 15490000, 'quantity' => 4, 'status' => 1], // Red-64GB
            ['id' => 55, 'product_id' => 6, 'price' => 16490000, 'sale_price' => 14990000, 'quantity' => 5, 'status' => 1], // Blue-32GB
            ['id' => 56, 'product_id' => 6, 'price' => 17490000, 'sale_price' => 15990000, 'quantity' => 3, 'status' => 1], // Blue-64GB

            // Asus TUF Gaming A15 - 4 biến thể
            ['id' => 57, 'product_id' => 7, 'price' => 21990000, 'sale_price' => 19990000, 'quantity' => 4, 'status' => 1], // Red-32GB
            ['id' => 58, 'product_id' => 7, 'price' => 22990000, 'sale_price' => 20990000, 'quantity' => 3, 'status' => 1], // Red-64GB
            ['id' => 59, 'product_id' => 7, 'price' => 22490000, 'sale_price' => 20490000, 'quantity' => 4, 'status' => 1], // Blue-32GB
            ['id' => 60, 'product_id' => 7, 'price' => 23490000, 'sale_price' => 21490000, 'quantity' => 2, 'status' => 1], // Blue-64GB

            // Asus Vivobook S 14 Flip - 4 biến thể
            ['id' => 61, 'product_id' => 8, 'price' => 19290000, 'sale_price' => 17490000, 'quantity' => 3, 'status' => 1], // Red-32GB
            ['id' => 62, 'product_id' => 8, 'price' => 20290000, 'sale_price' => 18490000, 'quantity' => 2, 'status' => 1], // Red-64GB
            ['id' => 63, 'product_id' => 8, 'price' => 19790000, 'sale_price' => 17990000, 'quantity' => 3, 'status' => 1], // Blue-32GB
            ['id' => 64, 'product_id' => 8, 'price' => 20790000, 'sale_price' => 18990000, 'quantity' => 2, 'status' => 1], // Blue-64GB

            // OPPO Pad Neo WiFi - 4 biến thể
            ['id' => 65, 'product_id' => 17, 'price' => 6490000, 'sale_price' => 5990000, 'quantity' => 10, 'status' => 1], // Red-32GB
            ['id' => 66, 'product_id' => 17, 'price' => 7490000, 'sale_price' => 6990000, 'quantity' => 8, 'status' => 1], // Red-64GB
            ['id' => 67, 'product_id' => 17, 'price' => 6990000, 'sale_price' => 6490000, 'quantity' => 9, 'status' => 1], // Blue-32GB
            ['id' => 68, 'product_id' => 17, 'price' => 7990000, 'sale_price' => 7490000, 'quantity' => 6, 'status' => 1], // Blue-64GB

            // Samsung Galaxy Tab A9+ - 4 biến thể
            ['id' => 69, 'product_id' => 18, 'price' => 7490000, 'sale_price' => 6990000, 'quantity' => 8, 'status' => 1], // Red-32GB
            ['id' => 70, 'product_id' => 18, 'price' => 8490000, 'sale_price' => 7990000, 'quantity' => 6, 'status' => 1], // Red-64GB
            ['id' => 71, 'product_id' => 18, 'price' => 7990000, 'sale_price' => 7490000, 'quantity' => 7, 'status' => 1], // Blue-32GB
            ['id' => 72, 'product_id' => 18, 'price' => 8990000, 'sale_price' => 8490000, 'quantity' => 5, 'status' => 1], // Blue-64GB

            // Honor Pad X9 - 4 biến thể
            ['id' => 73, 'product_id' => 19, 'price' => 4590000, 'sale_price' => 4190000, 'quantity' => 12, 'status' => 1], // Red-32GB
            ['id' => 74, 'product_id' => 19, 'price' => 5590000, 'sale_price' => 5190000, 'quantity' => 10, 'status' => 1], // Red-64GB
            ['id' => 75, 'product_id' => 19, 'price' => 5090000, 'sale_price' => 4690000, 'quantity' => 11, 'status' => 1], // Blue-32GB
            ['id' => 76, 'product_id' => 19, 'price' => 6090000, 'sale_price' => 5690000, 'quantity' => 8, 'status' => 1], // Blue-64GB

            // Samsung Galaxy Tab A9 - 4 biến thể
            ['id' => 77, 'product_id' => 20, 'price' => 3490000, 'sale_price' => 3190000, 'quantity' => 15, 'status' => 1], // Red-32GB
            ['id' => 78, 'product_id' => 20, 'price' => 4490000, 'sale_price' => 4190000, 'quantity' => 12, 'status' => 1], // Red-64GB
            ['id' => 79, 'product_id' => 20, 'price' => 3990000, 'sale_price' => 3690000, 'quantity' => 13, 'status' => 1], // Blue-32GB
            ['id' => 80, 'product_id' => 20, 'price' => 4990000, 'sale_price' => 4690000, 'quantity' => 10, 'status' => 1], // Blue-64GB

            // iPad 9 WiFi - 4 biến thể
            ['id' => 81, 'product_id' => 21, 'price' => 7490000, 'sale_price' => 6990000, 'quantity' => 10, 'status' => 1], // Red-32GB
            ['id' => 82, 'product_id' => 21, 'price' => 8490000, 'sale_price' => 7990000, 'quantity' => 8, 'status' => 1], // Red-64GB
            ['id' => 83, 'product_id' => 21, 'price' => 7990000, 'sale_price' => 7490000, 'quantity' => 9, 'status' => 1], // Blue-32GB
            ['id' => 84, 'product_id' => 21, 'price' => 8990000, 'sale_price' => 8490000, 'quantity' => 6, 'status' => 1], // Blue-64GB

            // iPad Air 5 M1 WiFi - 4 biến thể
            ['id' => 85, 'product_id' => 22, 'price' => 14590000, 'sale_price' => 13490000, 'quantity' => 5, 'status' => 1], // Red-32GB
            ['id' => 86, 'product_id' => 22, 'price' => 15590000, 'sale_price' => 14490000, 'quantity' => 4, 'status' => 1], // Red-64GB
            ['id' => 87, 'product_id' => 22, 'price' => 15090000, 'sale_price' => 13990000, 'quantity' => 5, 'status' => 1], // Blue-32GB
            ['id' => 88, 'product_id' => 22, 'price' => 16090000, 'sale_price' => 14990000, 'quantity' => 3, 'status' => 1], // Blue-64GB

            // iPad 10 WiFi - 4 biến thể
            ['id' => 89, 'product_id' => 23, 'price' => 11090000, 'sale_price' => 10290000, 'quantity' => 6, 'status' => 1], // Red-32GB
            ['id' => 90, 'product_id' => 23, 'price' => 12090000, 'sale_price' => 11290000, 'quantity' => 5, 'status' => 1], // Red-64GB
            ['id' => 91, 'product_id' => 23, 'price' => 11590000, 'sale_price' => 10790000, 'quantity' => 6, 'status' => 1], // Blue-32GB
            ['id' => 92, 'product_id' => 23, 'price' => 12590000, 'sale_price' => 11790000, 'quantity' => 4, 'status' => 1], // Blue-64GB

            // Lenovo Tab M10 (Gen3) - 4 biến thể
            ['id' => 93, 'product_id' => 24, 'price' => 5290000, 'sale_price' => 4890000, 'quantity' => 8, 'status' => 1], // Red-32GB
            ['id' => 94, 'product_id' => 24, 'price' => 6290000, 'sale_price' => 5890000, 'quantity' => 6, 'status' => 1], // Red-64GB
            ['id' => 95, 'product_id' => 24, 'price' => 5790000, 'sale_price' => 5390000, 'quantity' => 7, 'status' => 1], // Blue-32GB
            ['id' => 96, 'product_id' => 24, 'price' => 6790000, 'sale_price' => 6390000, 'quantity' => 5, 'status' => 1], // Blue-64GB

            // Wireless Bluetooth Headphone - 4 biến thể
            ['id' => 97, 'product_id' => 25, 'price' => 2190000, 'sale_price' => 1990000, 'quantity' => 15, 'status' => 1], // Red-32GB
            ['id' => 98, 'product_id' => 25, 'price' => 2290000, 'sale_price' => 2090000, 'quantity' => 12, 'status' => 1], // Red-64GB
            ['id' => 99, 'product_id' => 25, 'price' => 2240000, 'sale_price' => 2040000, 'quantity' => 13, 'status' => 1], // Blue-32GB
            ['id' => 100, 'product_id' => 25, 'price' => 2340000, 'sale_price' => 2140000, 'quantity' => 10, 'status' => 1], // Blue-64GB

            // Solo3 Wireless On-Ear Headphones - 4 biến thể
            ['id' => 101, 'product_id' => 26, 'price' => 3140000, 'sale_price' => 2970000, 'quantity' => 12, 'status' => 1], // Red-32GB
            ['id' => 102, 'product_id' => 26, 'price' => 3240000, 'sale_price' => 3070000, 'quantity' => 10, 'status' => 1], // Red-64GB
            ['id' => 103, 'product_id' => 26, 'price' => 3190000, 'sale_price' => 3020000, 'quantity' => 11, 'status' => 1], // Blue-32GB
            ['id' => 104, 'product_id' => 26, 'price' => 3290000, 'sale_price' => 3120000, 'quantity' => 8, 'status' => 1], // Blue-64GB

            // Vifa Portable Wireless Speaker - 4 biến thể
            ['id' => 105, 'product_id' => 27, 'price' => 3140000, 'sale_price' => 2890000, 'quantity' => 8, 'status' => 1], // Red-32GB
            ['id' => 106, 'product_id' => 27, 'price' => 3240000, 'sale_price' => 2990000, 'quantity' => 6, 'status' => 1], // Red-64GB
            ['id' => 107, 'product_id' => 27, 'price' => 3190000, 'sale_price' => 2940000, 'quantity' => 7, 'status' => 1], // Blue-32GB
            ['id' => 108, 'product_id' => 27, 'price' => 3290000, 'sale_price' => 3040000, 'quantity' => 5, 'status' => 1], // Blue-64GB

            // G951s Pink Stereo Gaming Headset - 4 biến thể
            ['id' => 109, 'product_id' => 28, 'price' => 3140000, 'sale_price' => 2890000, 'quantity' => 10, 'status' => 1], // Red-32GB
            ['id' => 110, 'product_id' => 28, 'price' => 3240000, 'sale_price' => 2990000, 'quantity' => 8, 'status' => 1], // Red-64GB
            ['id' => 111, 'product_id' => 28, 'price' => 3190000, 'sale_price' => 2940000, 'quantity' => 9, 'status' => 1], // Blue-32GB
            ['id' => 112, 'product_id' => 28, 'price' => 3290000, 'sale_price' => 3040000, 'quantity' => 6, 'status' => 1], // Blue-64GB
        ]);
    }
}
