<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderDetailSeeder extends Seeder
{
    public function run(): void
    {
        $orderDetails = [
            ['order_id' => 1, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => 'Giao nhanh', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 1, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 2, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => 'Giao nhanh', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 2, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 3, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => 'Giao nhanh', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 3, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 4, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 2, 'note' => 'Gói quà', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 5, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 2, 'note' => 'Gói quà', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 6, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 2, 'note' => 'Gói quà', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 7, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 8, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 9, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 10, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 10, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 1, 'note' => 'Màu đỏ', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 11, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 11, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 1, 'note' => 'Màu đỏ', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 12, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 12, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 1, 'note' => 'Màu đỏ', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 13, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => 'Hàng cao cấp', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 14, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => 'Hàng cao cấp', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 15, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => 'Hàng cao cấp', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 16, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 17, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 18, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 19, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 19, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 1, 'note' => 'Size L', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 20, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 20, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 1, 'note' => 'Size L', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 21, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 21, 'product_id' => 1, 'variant_id' => 3, 'price' => 29490000, 'quantity' => 1, 'note' => 'Size L', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 22, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 23, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 24, 'product_id' => 1, 'variant_id' => 2, 'price' => 29990000, 'quantity' => 1, 'note' => null, 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],
            ['order_id' => 25, 'product_id' => 1, 'variant_id' => 1, 'price' => 28990000, 'quantity' => 1, 'note' => 'Giao buổi sáng', 'created_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::parse('2025-08-25 00:19:31', 'Asia/Ho_Chi_Minh')],

        ];

        DB::table('order_details')->insert($orderDetails);
    }
}
