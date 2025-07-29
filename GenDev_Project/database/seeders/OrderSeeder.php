<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::insert([
            [
                'user_id' => 1,
                'coupon_id' => null,
                'shipping_id' => 1,
                'name' => 'Nguyễn Văn A',
                'email' => 'a@example.com',
                'phone' => '0901234567',
                'address' => '123 Lê Lợi, Q1, TP.HCM',
                'city' => 'Hồ Chí Minh',
                'ward' => 'Phường Bến Nghé',
                'postcode' => '70000',
                'payment' => 'cod',
                'total' => 150000,
                'shipping_fee' => 20000,
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'coupon_id' => 1,
                'shipping_id' => 2,
                'name' => 'Trần Thị B',
                'email' => 'b@example.com',
                'phone' => '0907654321',
                'address' => '45 Lý Thường Kiệt, Hà Nội',
                'city' => 'Hà Nội',
                'ward' => 'Hoàn Kiếm',
                'postcode' => '10000',
                'payment' => 'banking',
                'total' => 250000,
                'shipping_fee' => 30000,
                'status' => 'shipped',
                'payment_status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'coupon_id' => null,
                'shipping_id' => 3,
                'name' => 'Lê Văn C',
                'email' => 'c@example.com',
                'phone' => '0911223344',
                'address' => '789 Trần Hưng Đạo, Đà Nẵng',
                'city' => 'Đà Nẵng',
                'ward' => 'Hải Châu',
                'postcode' => '550000',
                'payment' => 'cod',
                'total' => 180000,
                'shipping_fee' => 25000,
                'status' => 'completed',
                'payment_status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Thêm seed cho order_details
        \App\Models\OrderDetail::insert([
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
        ]);
    }
}