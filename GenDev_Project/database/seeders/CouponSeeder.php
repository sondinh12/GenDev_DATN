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
            // Existing coupons (with corrected usage limits)
            [
                'name' => 'Giảm 50K đơn từ 200K',
                'coupon_code' => 'GIAM50K',
                'discount_type' => 'fixed',
                'discount_amount' => 50000,
                'type' => 'order',
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(30),
                'status' => 1,
                'max_coupon' => 50000,
                'min_coupon' => 200000,
                'usage_limit' => 100,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            [
                'name' => 'Giảm 20K toàn bộ đơn hàng',
                'coupon_code' => 'SALE20K',
                'discount_type' => 'fixed',
                'discount_amount' => 20000,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 1,
                'max_coupon' => 20000,
                'min_coupon' => 0,
                'usage_limit' => 200,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            [
                'name' => 'Giảm 10% tối đa 100K',
                'coupon_code' => 'GIAM10',
                'discount_type' => 'percent',
                'discount_amount' => 10,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addWeek(),
                'status' => 1,
                'max_coupon' => 100000,
                'min_coupon' => 50000,
                'usage_limit' => 150,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            [
                'name' => 'Giảm 100% phí ship',
                'coupon_code' => 'FREESHIP',
                'discount_type' => 'fixed',
                'discount_amount' => 30000,
                'type' => 'shipping',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(10),
                'status' => 1,
                'max_coupon' => 30000,
                'min_coupon' => 0,
                'usage_limit' => 50,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            [
                'name' => 'Giảm 20K phí ship',
                'coupon_code' => 'SHIP20K',
                'discount_type' => 'fixed',
                'discount_amount' => 20000,
                'type' => 'shipping',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(20),
                'status' => 1,
                'max_coupon' => 20000,
                'min_coupon' => 0,
                'usage_limit' => 75,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            
            // New percentage discount coupons
            [
                'name' => 'Giảm 15% tối đa 150K',
                'coupon_code' => 'GIAM15',
                'discount_type' => 'percent',
                'discount_amount' => 15,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(25),
                'status' => 1,
                'max_coupon' => 150000,
                'min_coupon' => 100000,
                'usage_limit' => 80,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            [
                'name' => 'Giảm 25% tối đa 200K',
                'coupon_code' => 'GIAM25',
                'discount_type' => 'percent',
                'discount_amount' => 25,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 1,
                'max_coupon' => 200000,
                'min_coupon' => 300000,
                'usage_limit' => 50,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            
            // New fixed amount coupons
            [
                'name' => 'Giảm 100K đơn từ 500K',
                'coupon_code' => 'GIAM100K',
                'discount_type' => 'fixed',
                'discount_amount' => 100000,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
                'status' => 1,
                'max_coupon' => 100000,
                'min_coupon' => 500000,
                'usage_limit' => 30,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            
            // New shipping discount coupons
            [
                'name' => 'Giảm 50% phí ship tối đa 25K',
                'coupon_code' => 'SHIP50',
                'discount_type' => 'percent',
                'discount_amount' => 50,
                'type' => 'shipping',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(20),
                'status' => 1,
                'max_coupon' => 25000,
                'min_coupon' => 0,
                'usage_limit' => 100,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],

            [
                'name' => 'Giảm 5K phí ship',
                'coupon_code' => 'SHIP5K',
                'discount_type' => 'fixed',
                'discount_amount' => 5000,
                'type' => 'shipping',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 1,
                'max_coupon' => 5000,
                'min_coupon' => 0,
                'usage_limit' => 60,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],

            [
                'name' => 'Giảm 30K phí ship',
                'coupon_code' => 'SHIP30K',
                'discount_type' => 'fixed',
                'discount_amount' => 30000,
                'type' => 'shipping',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 1,
                'max_coupon' => 30000,
                'min_coupon' => 0,
                'usage_limit' => 60,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],

            // Expired coupons for testing
            [
                'name' => 'Coupon đã hết hạn',
                'coupon_code' => 'EXPIRED',
                'discount_type' => 'fixed',
                'discount_amount' => 30000,
                'type' => 'order',
                'start_date' => Carbon::now()->subDays(30),
                'end_date' => Carbon::now()->subDays(1),
                'status' => 2, // Expired
                'max_coupon' => 30000,
                'min_coupon' => 100000,
                'usage_limit' => 50,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            
            // Upcoming coupons for testing
            [
                'name' => 'Coupon sắp có hiệu lực',
                'coupon_code' => 'UPCOMING',
                'discount_type' => 'percent',
                'discount_amount' => 20,
                'type' => 'order',
                'start_date' => Carbon::now()->addDays(5),
                'end_date' => Carbon::now()->addDays(30),
                'status' => 1, // Active but not yet valid
                'max_coupon' => 150000,
                'min_coupon' => 150000,
                'usage_limit' => 40,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            
            // Disabled coupon
            [
                'name' => 'Coupon bị vô hiệu hóa',
                'coupon_code' => 'DISABLED',
                'discount_type' => 'fixed',
                'discount_amount' => 50000,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
                'status' => 0, // Disabled
                'max_coupon' => 50000,
                'min_coupon' => 200000,
                'usage_limit' => 25,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1, // System-wide coupon
            ],
            
            // User-specific coupon (loyalty)
            [
                'name' => 'Coupon tri ân khách hàng thân thiết',
                'coupon_code' => 'LOYALTY50K',
                'discount_type' => 'fixed',
                'discount_amount' => 50000,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(60),
                'status' => 1,
                'max_coupon' => 50000,
                'min_coupon' => 150000,
                'usage_limit' => 10,
                'per_use_limit' => 1, // Can only be used once per user
                'total_used' => 0,
                'user_id' => 1, // Loyalty coupon (user-specific)
            ],
            
            [
                'name' => 'Giảm 30K cho khách hàng mới',
                'coupon_code' => 'NEWBIE30K',
                'discount_type' => 'fixed',
                'discount_amount' => 30000,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(7),
                'status' => 1,
                'max_coupon' => 30000,
                'min_coupon' => 100000,
                'usage_limit' => 100,
                'per_use_limit' => 1,
                'total_used' => 0,
                'user_id' => -1, // User-specific for new customers
            ],
            
            [
                'name' => 'Giảm 20% dịp Tết',
                'coupon_code' => 'TET2024',
                'discount_type' => 'percent',
                'discount_amount' => 20,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(10),
                'status' => 1,
                'max_coupon' => 300000,
                'min_coupon' => 200000,
                'usage_limit' => 200,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1,
            ],
            
            [
                'name' => 'Flash Sale Giảm 40%',
                'coupon_code' => 'FLASH40',
                'discount_type' => 'percent',
                'discount_amount' => 40,
                'type' => 'order',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(6),
                'status' => 1,
                'max_coupon' => 500000,
                'min_coupon' => 0,
                'usage_limit' => 25,
                'per_use_limit' => -1,
                'total_used' => 0,
                'user_id' => -1,
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
