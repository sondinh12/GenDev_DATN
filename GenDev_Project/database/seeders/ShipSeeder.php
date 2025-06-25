<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ship;

class ShipSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Ship::create([
                'name' => 'Giao hàng ' . $i,
                'shipping_price' => rand(20000, 50000),
            ]);
        }
    }
}
