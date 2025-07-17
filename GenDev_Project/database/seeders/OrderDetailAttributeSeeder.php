<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDetailAttribute;
use App\Models\Attribute;

class OrderDetailAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::first(); // hoặc lấy order phù hợp
        if (!$order) {
            // Không có order để gán, không thể seed
            return;
        }

        foreach (Product::all() as $product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $product->price,      // Lấy giá sản phẩm hoặc giá phù hợp
                'quantity' => 1,                 // Số lượng mặc định hoặc random
                // Thêm các trường khác nếu migration yêu cầu (vd: 'variant_id', 'note', ...)
            ]);
        }

        $orderDetails = OrderDetail::all();
        $attributes = Attribute::with('values')->get();

        if ($orderDetails->isEmpty() || $attributes->isEmpty()) {
            // Không có dữ liệu để seed
            return;
        }

        foreach ($orderDetails as $orderDetail) {
            foreach ($attributes as $attribute) {
                if ($attribute->values->isNotEmpty()) {
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
}
