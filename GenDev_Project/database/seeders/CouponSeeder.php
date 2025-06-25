<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Coupon::create([
                'user_id' => -1,
                'name' => 'Coupon ' . $i,
                'coupon_code' => 'CODE' . $i,
                'discount_type' => 'percent', // hoặc 'fixed'
                'discount_amount' => rand(5, 20),
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->addDays(30),
                'quantity' => rand(10, 100),
                'status' => 1,
                'max_coupon' => rand(50000, 200000),
                'min_coupon' => rand(10000, 40000),
                'usage_limit' => rand(1, 10),
                'per_use_limit' => 1,
                'total_used' => 0,
            ]);
        }
    }
}
