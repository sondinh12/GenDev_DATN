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
                'shipping_code' => null,
                'discount_type' => 'fixed',
                'discount_amount' => 50000,
                'type' => 'order',
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(30),
                'status' => 1,
                'max_coupon' => 50000,
                'min_coupon' => 200000,
                'usage_limit' => 1,
                'per_use_limit' => -1,
                'total_used' => 0,
            ],
            [
                'name' => 'Giảm 20K toàn bộ đơn hàng',
                'coupon_code' => 'SALE20K',
                'shipping_code' => null,
                'discount_type' => 'fixed',
                'discount_amount' => 20000,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 1,
                'max_coupon' => 20000,
                'min_coupon' => 0,
                'usage_limit' => 1,
                'per_use_limit' => -1,
                'total_used' => 0,
            ],
            [
                'name' => 'Giảm 10%',
                'coupon_code' => 'GIAM10',
                'shipping_code' => null,
                'discount_type' => 'percent',
                'discount_amount' => 10,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addWeek(),
                'status' => 1,
                'max_coupon' => 100000,
                'min_coupon' => 50000,
                'usage_limit' => 1,
                'per_use_limit' => -1,
                'total_used' => 0,
            ],
            [
                'name' => 'Giảm 100% phí ship',
                'coupon_code' => null,
                'shipping_code' => 'FREESHIP',
                'discount_type' => 'fixed',
                'discount_amount' => 30000,
                'type' => 'shipping',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(10),
                'status' => 1,
                'max_coupon' => 30000,
                'min_coupon' => 0,
                'usage_limit' => 1,
                'per_use_limit' => -1,
                'total_used' => 0,
            ],
            [
                'name' => 'Giảm 20K phí ship',
                'coupon_code' => null,
                'shipping_code' => 'SHIP20K',
                'discount_type' => 'fixed',
                'discount_amount' => 20000,
                'type' => 'shipping',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(20),
                'status' => 1,
                'max_coupon' => 20000,
                'min_coupon' => 0,
                'usage_limit' => 1,
                'per_use_limit' => -1,
                'total_used' => 0,
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}