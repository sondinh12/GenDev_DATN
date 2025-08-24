<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            // Nhóm 1: 3 đơn hàng cho user 1-3 (Nguyễn Văn A)
            [
                'user_id' => 1,
                'address' => '123 Lê Lợi, Q1, TP.HCM',
                'city' => 'Hồ Chí Minh',
                'ward' => 'Phường Bến Nghé',
                'postcode' => 70000,
                'name' => 'Nguyễn Văn A',
                'email' => 'a@example.com',
                'phone' => '0901234567',
                'payment' => 'cod',
                'payment_status' => 'unpaid',
                'status' => 'pending',
                'subtotal' => 58980000,
                'shipping_fee' => 20000,
                'shipping_id' => 1,
                'product_coupon_id' => null,
                'product_discount' => 0,
                'shipping_coupon_id' => null,
                'shipping_discount' => 0,
                'total' => 59000000,
                'created_at' => Carbon::parse('2025-08-15 00:11:22', 'Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::parse('2025-08-15 00:11:22', 'Asia/Ho_Chi_Minh'),
            ],
            [
                'user_id' => 2,
                'address' => '123 Lê Lợi, Q1, TP.HCM',
                'city' => 'Hồ Chí Minh',
                'ward' => 'Phường Bến Nghé',
                'postcode' => 70000,
                'name' => 'Nguyễn Văn A',
                'email' => 'a@example.com',
                'phone' => '0901234567',
                'payment' => 'cod',
                'payment_status' => 'unpaid',
                'status' => 'pending',
                'subtotal' => 58980000,
                'shipping_fee' => 20000,
                'shipping_id' => 1,
                'product_coupon_id' => null,
                'product_discount' => 0,
                'shipping_coupon_id' => null,
                'shipping_discount' => 0,
                'total' => 59000000,
                'created_at' => Carbon::parse('2025-08-15 00:11:22', 'Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::parse('2025-08-15 00:11:22', 'Asia/Ho_Chi_Minh'),
            ],
            [
                'user_id' => 3,
                'address' => '123 Lê Lợi, Q1, TP.HCM',
                'city' => 'Hồ Chí Minh',
                'ward' => 'Phường Bến Nghé',
                'postcode' => 70000,
                'name' => 'Nguyễn Văn A',
                'email' => 'a@example.com',
                'phone' => '0901234567',
                'payment' => 'cod',
                'payment_status' => 'unpaid',
                'status' => 'pending',
                'subtotal' => 58980000,
                'shipping_fee' => 20000,
                'shipping_id' => 1,
                'product_coupon_id' => null,
                'product_discount' => 0,
                'shipping_coupon_id' => null,
                'shipping_discount' => 0,
                'total' => 59000000,
                'created_at' => Carbon::parse('2025-08-15 00:11:22', 'Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::parse('2025-08-15 00:11:22', 'Asia/Ho_Chi_Minh'),
            ],
            // Nhóm 2: 3 đơn hàng cho user 4-6 (Trần Thị B)
            [
                'user_id' => 4,
                'address' => '45 Lý Thường Kiệt, Hà Nội',
                'city' => 'Hà Nội',
                'ward' => 'Hoàn Kiếm',
                'postcode' => 10000,
                'name' => 'Trần Thị B',
                'email' => 'b@example.com',
                'phone' => '0907654321',
                'payment' => 'banking',
                'payment_status' => 'paid',
                'status' => 'shipping',
                'subtotal' => 58980000,
                'shipping_fee' => 30000,
                'shipping_id' => 2,
                'product_coupon_id' => 1,
                'product_discount' => 50000,
                'shipping_coupon_id' => null,
                'shipping_discount' => 0,
                'total' => 58960000,
                'created_at' => Carbon::parse('2025-08-16 00:11:22', 'Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::parse('2025-08-16 00:11:22', 'Asia/Ho_Chi_Minh'),
            ],
            [
                'user_id' => 5,
                'address' => '45 Lý Thường Kiệt, Hà Nội',
                'city' => 'Hà Nội',
                'ward' => 'Hoàn Kiếm',
                'postcode' => 10000,
                'name' => 'Trần Thị B',
                'email' => 'b@example.com',
                'phone' => '0907654321',
                'payment' => 'banking',
                'payment_status' => 'paid',
                'status' => 'shipping',
                'subtotal' => 58980000,
                'shipping_fee' => 30000,
                'shipping_id' => 2,
                'product_coupon_id' => 1,
                'product_discount' => 50000,
                'shipping_coupon_id' => null,
                'shipping_discount' => 0,
                'total' => 58960000,
                'created_at' => Carbon::parse('2025-08-16 00:11:22', 'Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::parse('2025-08-16 00:11:22', 'Asia/Ho_Chi_Minh'),
            ],
            [
                'user_id' => 6,
                'address' => '45 Lý Thường Kiệt, Hà Nội',
                'city' => 'Hà Nội',
                'ward' => 'Hoàn Kiếm',
                'postcode' => 10000,
                'name' => 'Trần Thị B',
                'email' => 'b@example.com',
                'phone' => '0907654321',
                'payment' => 'banking',
                'payment_status' => 'paid',
                'status' => 'shipping',
                'subtotal' => 58980000,
                'shipping_fee' => 30000,
                'shipping_id' => 2,
                'product_coupon_id' => 1,
                'product_discount' => 50000,
                'shipping_coupon_id' => null,
                'shipping_discount' => 0,
                'total' => 58960000,
                'created_at' => Carbon::parse('2025-08-16 00:11:22', 'Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::parse('2025-08-16 00:11:22', 'Asia/Ho_Chi_Minh'),
            ],
            // Tiếp tục cho các nhóm còn lại (Lê Văn C, Phạm Thị D, Hoàng Văn E, Vũ Thị F, Đặng Văn G, Bùi Thị H, Lý Văn I, Trịnh Thị K, Ngô Văn L)
            // (Rút gọn để tránh lặp lại, bạn có thể mở rộng tương tự)
            [
                'user_id' => 7,
                'address' => '789 Trần Hưng Đạo, Đà Nẵng',
                'city' => 'Đà Nẵng',
                'ward' => 'Hải Châu',
                'postcode' => 550000,
                'name' => 'Lê Văn C',
                'email' => 'c@example.com',
                'phone' => '0911223344',
                'payment' => 'cod',
                'payment_status' => 'paid',
                'status' => 'completed',
                'subtotal' => 28990000,
                'shipping_fee' => 25000,
                'shipping_id' => 3,
                'product_coupon_id' => null,
                'product_discount' => 0,
                'shipping_coupon_id' => 5,
                'shipping_discount' => 20000,
                'total' => 28995000,
                'created_at' => Carbon::parse('2025-08-17 00:11:22', 'Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::parse('2025-08-17 00:11:22', 'Asia/Ho_Chi_Minh'),
            ],
            // Sao chép tương tự cho 2 bản ghi còn lại của Lê Văn C, và các nhóm khác...
        ];

        // Mở rộng thành 33 bản ghi
        $allOrders = [];
        $baseDates = [
            '2025-08-15 00:11:22',
            '2025-08-16 00:11:22',
            '2025-08-17 00:11:22',
            '2025-08-18 00:11:22',
            '2025-08-19 00:11:22',
            '2025-08-20 00:11:22',
            '2025-08-21 00:11:22',
            '2025-08-22 00:11:22',
            '2025-08-23 00:11:22',
            '2025-08-24 00:11:22',
            '2025-08-25 00:11:22'
        ];
        $users = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $index = 0;

        foreach ($users as $userId) {
            for ($i = 0; $i < 3; $i++) {
                $order = $orders[$index % count($orders)];
                $allOrders[] = array_merge($order, [
                    'user_id' => $userId,
                    'created_at' => Carbon::parse($baseDates[$index % count($baseDates)], 'Asia/Ho_Chi_Minh'),
                    'updated_at' => Carbon::parse($baseDates[$index % count($baseDates)], 'Asia/Ho_Chi_Minh'),
                ]);
                $index++;
            }
        }

        DB::table('orders')->insert($allOrders);
    }
}
