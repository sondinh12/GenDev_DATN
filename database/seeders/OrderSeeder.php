<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Dữ liệu từ OrderDetailSeeder (chỉ price & quantity)
        $orderDetails = [
            ['order_id' => 1, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 1, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 2, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 2, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 3, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 3, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 4, 'price' => 29490000, 'quantity' => 2],
            ['order_id' => 5, 'price' => 29490000, 'quantity' => 2],
            ['order_id' => 6, 'price' => 29490000, 'quantity' => 2],
            ['order_id' => 7, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 8, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 9, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 10, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 10, 'price' => 29490000, 'quantity' => 1],
            ['order_id' => 11, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 11, 'price' => 29490000, 'quantity' => 1],
            ['order_id' => 12, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 12, 'price' => 29490000, 'quantity' => 1],
            ['order_id' => 13, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 14, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 15, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 16, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 17, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 18, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 19, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 19, 'price' => 29490000, 'quantity' => 1],
            ['order_id' => 20, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 20, 'price' => 29490000, 'quantity' => 1],
            ['order_id' => 21, 'price' => 28990000, 'quantity' => 1],
            ['order_id' => 21, 'price' => 29490000, 'quantity' => 1],
            ['order_id' => 22, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 23, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 24, 'price' => 29990000, 'quantity' => 1],
            ['order_id' => 25, 'price' => 28990000, 'quantity' => 1],
        ];

        $shippingFee = 20000;
        $statuses = ['pending', 'processing', 'shipping', 'return_requested', 'shipped', 'completed', 'cancelled'];

        $orderGroups = collect($orderDetails)->groupBy('order_id');
        $orders = [];
        $i = 0;
        $baseDate = Carbon::parse('2025-08-15 10:00:00', 'Asia/Ho_Chi_Minh');

        foreach ($orderGroups as $orderId => $details) {
            $subtotal = $details->sum(fn($d) => $d['price'] * $d['quantity']);
            $total = $subtotal + $shippingFee;

            $userId = ($orderId % 9 === 0) ? 9 : $orderId % 9; // user_id 1 → 9
            $status = $statuses[$i % count($statuses)]; // xoay vòng trạng thái

            // Mặc định
            $payment = ($i % 2 == 0) ? 'cod' : 'banking';
            $paymentStatus = ($i % 3 == 0) ? 'paid' : 'unpaid';

            // Nếu return_requested => ép payment = banking + status = refund
            if ($status === 'return_requested') {
                $payment = 'banking';
                $paymentStatus = 'refund';
            }

            $orders[] = [
                'user_id' => $userId,
                'address' => 'Địa chỉ user ' . $userId,
                'city' => 'Thành phố demo',
                'ward' => 'Phường demo',
                'postcode' => 70000 + $userId,
                'name' => 'User ' . $userId,
                'email' => 'user' . $userId . '@example.com',
                'phone' => '0900000' . $userId,
                'payment' => $payment,
                'payment_status' => $paymentStatus,
                'status' => $status,
                'subtotal' => $subtotal,
                'shipping_fee' => $shippingFee,
                'shipping_id' => 1,
                'product_coupon_id' => null,
                'product_discount' => 0,
                'shipping_coupon_id' => null,
                'shipping_discount' => 0,
                'total' => $total,
                'created_at' => $baseDate->copy()->addDays($i),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ];
            $i++;
        }

        DB::table('orders')->insert($orders);
    }
}
