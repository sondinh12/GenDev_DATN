<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\CategoryMini;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Điện thoại
            ['name' => 'iPhone 15 Pro Max', 'image' => 'https://cdn.tgdd.vn/Products/Images/42/303891/iphone-15-pro-max-blue-1-600x600.jpg', 'category_name' => 'iPhone', 'sale_price' => 32000000, 'price' => 35000000, 'quantity' => 10, 'status' => 1, 'description' => 'iPhone 15 Pro Max mới nhất của Apple.'],
            ['name' => 'Samsung Galaxy S24 Ultra', 'image' => 'https://cdn.tgdd.vn/Products/Images/42/303891/samsung-galaxy-s24-ultra-600x600.jpg', 'category_name' => 'Samsung', 'sale_price' => 27000000, 'price' => 30000000, 'quantity' => 12, 'status' => 1, 'description' => 'Flagship Samsung Galaxy S24 Ultra.'],
            ['name' => 'Xiaomi 14', 'image' => 'https://cdn.tgdd.vn/Products/Images/42/303891/xiaomi-14-600x600.jpg', 'category_name' => 'Xiaomi', 'sale_price' => 18000000, 'price' => 20000000, 'quantity' => 15, 'status' => 1, 'description' => 'Điện thoại Xiaomi 14 hiệu năng cao.'],
            // Laptop
            ['name' => 'MacBook Air M2', 'image' => 'https://cdn.tgdd.vn/Products/Images/44/299454/macbook-air-m2-2022-600x600.jpg', 'category_name' => 'MacBook', 'sale_price' => 25000000, 'price' => 27000000, 'quantity' => 8, 'status' => 1, 'description' => 'MacBook Air M2 2022 siêu mỏng nhẹ.'],
            ['name' => 'Dell XPS 13', 'image' => 'https://cdn.tgdd.vn/Products/Images/44/299454/dell-xps-13-600x600.jpg', 'category_name' => 'Dell', 'sale_price' => 22000000, 'price' => 24000000, 'quantity' => 7, 'status' => 1, 'description' => 'Laptop Dell XPS 13 cao cấp.'],
            ['name' => 'HP Spectre x360', 'image' => 'https://cdn.tgdd.vn/Products/Images/44/299454/hp-spectre-x360-600x600.jpg', 'category_name' => 'HP', 'sale_price' => 21000000, 'price' => 23000000, 'quantity' => 6, 'status' => 1, 'description' => 'HP Spectre x360 2-in-1.'],
            // Phụ kiện
            ['name' => 'Tai nghe AirPods Pro', 'image' => 'https://cdn.tgdd.vn/Products/Images/54/299454/airpods-pro-2-600x600.jpg', 'category_name' => 'Tai nghe', 'sale_price' => 5000000, 'price' => 6000000, 'quantity' => 20, 'status' => 1, 'description' => 'Tai nghe không dây AirPods Pro 2.'],
            ['name' => 'Sạc dự phòng Anker', 'image' => 'https://cdn.tgdd.vn/Products/Images/57/299454/anker-powerbank-600x600.jpg', 'category_name' => 'Sạc dự phòng', 'sale_price' => 800000, 'price' => 1000000, 'quantity' => 30, 'status' => 1, 'description' => 'Sạc dự phòng Anker dung lượng cao.'],
            ['name' => 'Ốp lưng iPhone 15', 'image' => 'https://cdn.tgdd.vn/Products/Images/58/299454/op-lung-iphone-15-600x600.jpg', 'category_name' => 'Ốp lưng', 'sale_price' => 300000, 'price' => 400000, 'quantity' => 25, 'status' => 1, 'description' => 'Ốp lưng bảo vệ iPhone 15.'],
            // Máy tính bảng
            ['name' => 'iPad Pro M2', 'image' => 'https://cdn.tgdd.vn/Products/Images/522/299454/ipad-pro-m2-600x600.jpg', 'category_name' => 'iPad', 'sale_price' => 27000000, 'price' => 30000000, 'quantity' => 9, 'status' => 1, 'description' => 'iPad Pro M2 2022 mạnh mẽ.'],
            ['name' => 'Samsung Galaxy Tab S9', 'image' => 'https://cdn.tgdd.vn/Products/Images/522/299454/samsung-galaxy-tab-s9-600x600.jpg', 'category_name' => 'Samsung Tab', 'sale_price' => 18000000, 'price' => 20000000, 'quantity' => 10, 'status' => 1, 'description' => 'Máy tính bảng Samsung Tab S9.'],
            ['name' => 'Lenovo Tab P12', 'image' => 'https://cdn.tgdd.vn/Products/Images/522/299454/lenovo-tab-p12-600x600.jpg', 'category_name' => 'Lenovo Tab', 'sale_price' => 9000000, 'price' => 11000000, 'quantity' => 12, 'status' => 1, 'description' => 'Lenovo Tab P12 giá tốt.'],
            // Tivi
            ['name' => 'Tivi Sony Bravia 55 inch', 'image' => 'https://cdn.tgdd.vn/Products/Images/1942/299454/sony-bravia-55-600x600.jpg', 'category_name' => 'Sony', 'sale_price' => 15000000, 'price' => 17000000, 'quantity' => 5, 'status' => 1, 'description' => 'Tivi Sony Bravia 4K 55 inch.'],
            ['name' => 'Tivi LG OLED 48 inch', 'image' => 'https://cdn.tgdd.vn/Products/Images/1942/299454/lg-oled-48-600x600.jpg', 'category_name' => 'LG', 'sale_price' => 18000000, 'price' => 20000000, 'quantity' => 4, 'status' => 1, 'description' => 'Tivi LG OLED 48 inch siêu mỏng.'],
            ['name' => 'Tivi Samsung QLED 65 inch', 'image' => 'https://cdn.tgdd.vn/Products/Images/1942/299454/samsung-qled-65-600x600.jpg', 'category_name' => 'Samsung', 'sale_price' => 22000000, 'price' => 25000000, 'quantity' => 6, 'status' => 1, 'description' => 'Tivi Samsung QLED 65 inch.'],
            // Âm thanh
            ['name' => 'Loa Bluetooth JBL', 'image' => 'https://cdn.tgdd.vn/Products/Images/2162/299454/jbl-bluetooth-600x600.jpg', 'category_name' => 'Loa Bluetooth', 'sale_price' => 2000000, 'price' => 2500000, 'quantity' => 15, 'status' => 1, 'description' => 'Loa Bluetooth JBL chất lượng cao.'],
            ['name' => 'Tai nghe Sony WF-1000XM4', 'image' => 'https://cdn.tgdd.vn/Products/Images/2162/299454/sony-wf-1000xm4-600x600.jpg', 'category_name' => 'Tai nghe không dây', 'sale_price' => 4000000, 'price' => 4500000, 'quantity' => 18, 'status' => 1, 'description' => 'Tai nghe không dây Sony WF-1000XM4.'],
            ['name' => 'Amply Denon PMA-600NE', 'image' => 'https://cdn.tgdd.vn/Products/Images/2162/299454/denon-amply-600x600.jpg', 'category_name' => 'Amply', 'sale_price' => 8000000, 'price' => 9000000, 'quantity' => 3, 'status' => 1, 'description' => 'Amply Denon PMA-600NE cao cấp.'],
            // Máy ảnh
            ['name' => 'Canon EOS R8', 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/299454/canon-eos-r8-600x600.jpg', 'category_name' => 'Canon', 'sale_price' => 32000000, 'price' => 35000000, 'quantity' => 2, 'status' => 1, 'description' => 'Máy ảnh Canon EOS R8 chuyên nghiệp.'],
            ['name' => 'Nikon Z6 II', 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/299454/nikon-z6-ii-600x600.jpg', 'category_name' => 'Nikon', 'sale_price' => 29000000, 'price' => 32000000, 'quantity' => 2, 'status' => 1, 'description' => 'Máy ảnh Nikon Z6 II hiệu năng cao.'],
            ['name' => 'Sony Alpha A7 IV', 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/299454/sony-alpha-a7-iv-600x600.jpg', 'category_name' => 'Sony', 'sale_price' => 35000000, 'price' => 38000000, 'quantity' => 2, 'status' => 1, 'description' => 'Máy ảnh Sony Alpha A7 IV.'],
        ];

        foreach ($products as $data) {
            $categoryMini = CategoryMini::where('name', $data['category_name'])->first();
            if ($categoryMini) {
                $data['category_id'] = $categoryMini->category_id;
                $data['category_mini_id'] = $categoryMini->id;
            } else {
                // Nếu không tìm thấy danh mục con, thử tìm danh mục cha
                $category = Category::where('name', $data['category_name'])->first();
                if ($category) {
                    $data['category_id'] = $category->id;
                    $data['category_mini_id'] = null;
                } else {
                    continue; // Bỏ qua nếu không tìm thấy danh mục phù hợp
                }
            }
            unset($data['category_name']);
            Product::create($data);
        }
    }
}
