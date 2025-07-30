<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use Illuminate\Support\Carbon;

class OrderDetailSeeder extends Seeder
{
    public function run(): void
    {
        OrderDetail::insert([
            // Order 1 details (2 products)
            [
                'order_id' => 1,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 100000,
                'quantity' => 1,
                'note' => 'Giao nhanh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 1,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 50000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 2 details (1 product)
            [
                'order_id' => 2,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 150000,
                'quantity' => 2,
                'note' => 'Gói quà',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 3 details (1 product)
            [
                'order_id' => 3,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 200000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 4 details (2 products)
            [
                'order_id' => 4,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 120000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 4,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 130000,
                'quantity' => 1,
                'note' => 'Màu đỏ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 5 details (1 product)
            [
                'order_id' => 5,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 500000,
                'quantity' => 1,
                'note' => 'Hàng cao cấp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 6 details (1 product)
            [
                'order_id' => 6,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 120000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 7 details (2 products)
            [
                'order_id' => 7,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 200000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 7,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 150000,
                'quantity' => 1,
                'note' => 'Size L',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 8 details (1 product)
            [
                'order_id' => 8,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 200000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 9 details (1 product)
            [
                'order_id' => 9,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 80000,
                'quantity' => 1,
                'note' => 'Giao buổi sáng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 10 details (2 products)
            [
                'order_id' => 10,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 250000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 10,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 150000,
                'quantity' => 1,
                'note' => 'Màu xanh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 11 details (1 product)
            [
                'order_id' => 11,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 600000,
                'quantity' => 1,
                'note' => 'Premium quality',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 12 details (1 product)
            [
                'order_id' => 12,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 160000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 13 details (1 product)
            [
                'order_id' => 13,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 90000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 14 details (1 product)
            [
                'order_id' => 14,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 280000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 15 details (2 products)
            [
                'order_id' => 15,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 160000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 15,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 160000,
                'quantity' => 1,
                'note' => 'Màu vàng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 16 details (1 product)
            [
                'order_id' => 16,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 140000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 17 details (1 product)
            [
                'order_id' => 17,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 750000,
                'quantity' => 1,
                'note' => 'Hàng VIP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 18 details (1 product)
            [
                'order_id' => 18,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 110000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 19 details (2 products)
            [
                'order_id' => 19,
                'product_id' => 1,
                'variant_id' => 1,
                'price' => 250000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 19,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 200000,
                'quantity' => 1,
                'note' => 'Giao nhanh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Order 20 details (1 product)
            [
                'order_id' => 20,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 190000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
