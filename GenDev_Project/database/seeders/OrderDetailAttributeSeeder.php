<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\OrderDetailAttribute;

class OrderDetailAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $orderDetails = OrderDetail::all();
        $attributes = [
            ['attribute_name' => 'Màu sắc', 'attribute_value' => 'Đỏ'],
            ['attribute_name' => 'Kích thước', 'attribute_value' => 'L'],
            ['attribute_name' => 'Chất liệu', 'attribute_value' => 'Cotton'],
        ];
        foreach ($orderDetails as $orderDetail) {
            foreach ($attributes as $attr) {
                OrderDetailAttribute::create([
                    'order_detail_id' => $orderDetail->id,
                    'attribute_name' => $attr['attribute_name'],
                    'attribute_value' => $attr['attribute_value'],
                ]);
            }
        }
    }
}
