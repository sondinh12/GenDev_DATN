<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryMini;
use App\Models\Product;
use App\Models\ProductGallery;

class CategoryMiniSeeder extends Seeder
{
    public function run(): void
    {
        $childCategories = [
            "Điện thoại" => ["iPhone", "Samsung", "Xiaomi"],
            "Laptop" => ["MacBook", "Dell", "HP"],
            "Phụ kiện" => ["Tai nghe", "Sạc dự phòng", "Ốp lưng"],
            "Máy tính bảng" => ["iPad", "Samsung Tab", "Lenovo Tab"],
            "Tivi" => ["Sony", "LG", "Samsung"],
            "Âm thanh" => ["Loa Bluetooth", "Tai nghe không dây", "Amply"],
            "Máy ảnh" => ["Canon", "Nikon", "Sony"],
            "Thiết bị đeo thông minh" => ["Apple Watch", "Samsung Galaxy Watch", "Xiaomi Mi Band"],
            "Thiết bị mạng" => ["Router", "Switch", "Repeater"],
            "Máy in" => ["Canon", "HP", "Epson"],
        ];

        foreach ($childCategories as $parentName => $children) {
            $parent = Category::where('name', $parentName)->first();
            if ($parent) {
                foreach ($children as $childName) {
                    CategoryMini::create([
                        'name' => $childName,
                        'category_id' => $parent->id,
                        'status' => 1,
                        'image' => $parent->image, // hoặc để null nếu không cần
                    ]);
                }
            }
        }

        // foreach (Product::all() as $product) {
        //     ProductGallery::create([
        //         'product_id' => $product->id,
        //         'image' => 'tshirt_side.jpg',
        //     ]);
        //     ProductGallery::create([
        //         'product_id' => $product->id,
        //         'image' => 'tshirt_back.jpg',
        //     ]);
        // }
    }
}
