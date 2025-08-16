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
                'price' => 28990000,
                'quantity' => 1,
                'note' => 'Giao nhanh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 1,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 29990000,
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
                'price' => 29490000,
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
                'price' => 28990000,
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
                'price' => 29990000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 4,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 29490000,
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
                'price' => 28990000,
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
                'price' => 29990000,
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
                'price' => 28990000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 7,
                'product_id' => 1,
                'variant_id' => 3,
                'price' => 29490000,
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
                'price' => 29990000,
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
                'price' => 28990000,
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
                'price' => 28990000,
                'quantity' => 1,
                'note' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 10,
                'product_id' => 1,
                'variant_id' => 2,
                'price' => 29990000,
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
                'price' => 29490000,
                'quantity' => 1,
                'note' => 'Premium quality',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
