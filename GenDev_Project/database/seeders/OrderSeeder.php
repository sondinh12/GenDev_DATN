<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Coupon;
use App\Models\Ship;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();
        $variants = ProductVariant::all();
        $coupons = Coupon::all();
        $ships = Ship::all();

        if ($users->isEmpty() || $products->isEmpty() || $variants->isEmpty() || $coupons->isEmpty() || $ships->isEmpty()) {
            if (isset($this->command)) {
                $this->command->warn('Cần có dữ liệu users, products, product_variants, coupons, ships trước khi seed orders!');
            }
            return;
        }

        for ($i = 1; $i <= 10; $i++) {
            $user = $users->random();
            $product = $products->random();
            $variant = $variants->where('product_id', $product->id)->first() ?? $variants->random();
            $coupon = $coupons->random();

            $orderDetail = OrderDetail::create([
                'amount' => rand(100000, 1000000),
                'note' => 'Ghi chú đơn hàng ' . $i,
                'user_id' => $user->id,
                'shipping_id' => $ships->random()->id,
            ]);

            Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'variant_id' => $variant->id,
                'order_detail_id' => $orderDetail->id,
                'coupon_id' => $coupon->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => '09' . rand(10000000, 99999999),
                'address' => 'Địa chỉ mẫu ' . $i,
                'status' => rand(1, 3),
            ]);
        }
    }
}
