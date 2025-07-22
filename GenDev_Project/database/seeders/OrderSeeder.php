<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::insert([
            [
                'user_id' => 1,
                'product_coupon_id' => null,
                'shipping_coupon_id' => null,
                'shipping_id' => 1,
                'name' => 'Nguyễn Văn A',
                'email' => 'a@example.com',
                'phone' => '0901234567',
                'address' => '123 Lê Lợi, Q1, TP.HCM',
                'city' => 'Hồ Chí Minh',
                'ward' => 'Phường Bến Nghé',
                'postcode' => '70000',
                'payment' => 'cod',
                'payment_status' => 'unpaid',
                'subtotal' => 150000,
                'product_discount' => 0,
                'shipping_discount' => 0,
                'total' => 150000,
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'product_coupon_id' => 1,
                'shipping_coupon_id' => null,
                'shipping_id' => 2,
                'name' => 'Trần Thị B',
                'email' => 'b@example.com',
                'phone' => '0907654321',
                'address' => '45 Lý Thường Kiệt, Hà Nội',
                'city' => 'Hà Nội',
                'ward' => 'Hoàn Kiếm',
                'postcode' => '10000',
                'payment' => 'banking',
                'payment_status' => 'paid',
                'subtotal' => 300000,
                'product_discount' => 50000,
                'shipping_discount' => 0,
                'total' => 250000,
                'status' => 'shipping',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'product_coupon_id' => null,
                'shipping_coupon_id' => 2,
                'shipping_id' => 3,
                'name' => 'Lê Văn C',
                'email' => 'c@example.com',
                'phone' => '0911223344',
                'address' => '789 Trần Hưng Đạo, Đà Nẵng',
                'city' => 'Đà Nẵng',
                'ward' => 'Hải Châu',
                'postcode' => '550000',
                'payment' => 'cod',
                'payment_status' => 'paid',
                'subtotal' => 200000,
                'product_discount' => 0,
                'shipping_discount' => 20000,
                'total' => 180000,
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        OrderDetail::insert([
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
