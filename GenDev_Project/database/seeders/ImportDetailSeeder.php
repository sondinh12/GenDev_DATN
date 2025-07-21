<?php

namespace Database\Seeders;

use App\Models\Import;
use App\Models\ImportDetail;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImportDetail::truncate();
        $imports = Import::all();
        $products = Product::all();

        foreach ($imports as $import) {
            $total = 0;

            foreach ($products->random(min(3, $products->count())) as $product) {
                $variantId = null;
                if (!$product->variants->isEmpty()) {
                    $variant = $product->variants->random();
                    $variantId = $variant->id;
                }

                $quantity = rand(1, 10);
                $price = rand(100000, 300000);
                $subtotal = $price * $quantity;

                ImportDetail::create([
                    'import_id' => $import->id,
                    'product_id' => $product->id,
                    'variant_id' => $variantId,
                    'quantity' => $quantity,
                    'import_price' => $price,
                    'subtotal' => $subtotal,
                ]);

                $total += $subtotal;
            }

            // cập nhật tổng tiền cho phiếu nhập
            $import->update(['total_cost' => $total]);
        }
    }
}
