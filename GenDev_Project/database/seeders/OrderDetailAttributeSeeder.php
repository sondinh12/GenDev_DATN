<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\OrderDetailAttribute;
use App\Models\Attribute;
use App\Models\AttributeValue;

class OrderDetailAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $orderDetails = OrderDetail::all();
        $attributes = Attribute::with('values')->get();
        foreach ($orderDetails as $orderDetail) {
            foreach ($attributes as $attribute) {
                // Lấy ngẫu nhiên một giá trị cho mỗi thuộc tính
                $value = $attribute->values->random();
                OrderDetailAttribute::create([
                    'order_detail_id' => $orderDetail->id,
                    'attribute_name' => $attribute->name,
                    'attribute_value' => $value->value,
                ]);
            }
        }
    }
}
