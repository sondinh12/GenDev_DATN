<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $coupons = [
            [
                'name' => 'Giảm 50K đơn từ 200K',
                'coupon_code' => 'GIAM50K',
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(30),
                'quantity' => 100,
                'status' => 1,
                'max_coupon' => 50000,
                'min_coupon' => 200000,
            ],
            [
                'name' => 'Giảm 20K toàn bộ đơn hàng',
                'coupon_code' => 'SALE20K',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
                'quantity' => 50,
                'status' => 1,
                'max_coupon' => 20000,
                'min_coupon' => 0,
            ],
            [
                'name' => 'Giảm 10%',
                'coupon_code' => 'GIAM10',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addWeek(),
                'quantity' => 200,
                'status' => 1,
                'max_coupon' => 100000,
                'min_coupon' => 50000,
            ]
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
