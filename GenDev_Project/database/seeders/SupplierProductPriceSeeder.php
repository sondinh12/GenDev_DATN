<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierProductPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();
        $products = Product::all();

        foreach ($suppliers as $supplier) {
            foreach ($products->random(5) as $product) {
                SupplierProductPrice::create([
                    'supplier_id' => $supplier->id,
                    'product_id' => $product->id,
                    'import_price' => rand(50000, 300000),
                    'start_date' => now()->subDays(rand(30, 60)),
                    'end_date' => null
                ]);
            }
        }
    }
}
