<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ship;

class ShipSeeder extends Seeder
{
    public function run()
    {
        Ship::insert([
            ['name' => 'Giao hàng tiêu chuẩn', 'shipping_price' => 20000],
            ['name' => 'Giao hàng nhanh', 'shipping_price' => 30000],
            ['name' => 'Giao hàng tiết kiệm', 'shipping_price' => 25000],
        ]);
    }
}
