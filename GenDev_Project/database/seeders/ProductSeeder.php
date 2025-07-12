<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Điện thoại
            [
                'name' => 'iPhone 15 Pro Max',
                'image' => 'products/iphone-15-pro-max.jpg',
                'price' => 29990000,
                'sale_price' => 27990000,
                'quantity' => 50,
                'status' => 1,
                'description' => 'iPhone 15 Pro Max với chip A17 Pro, camera 48MP, màn hình 6.7 inch Super Retina XDR OLED',
                'category_id' => 1
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'image' => 'products/samsung-s24-ultra.jpg',
                'price' => 26990000,
                'sale_price' => 24990000,
                'quantity' => 30,
                'status' => 1,
                'description' => 'Samsung Galaxy S24 Ultra với S Pen, camera 200MP, màn hình 6.8 inch Dynamic AMOLED 2X',
                'category_id' => 1
            ],
            [
                'name' => 'iPad Pro 12.9 inch',
                'image' => 'products/ipad-pro-12.jpg',
                'price' => 32990000,
                'sale_price' => 0,
                'quantity' => 25,
                'status' => 1,
                'description' => 'iPad Pro 12.9 inch với chip M2, màn hình Liquid Retina XDR, hỗ trợ Apple Pencil',
                'category_id' => 1
            ],

            // Laptop & Máy tính
            [
                'name' => 'MacBook Pro 14 inch M3',
                'image' => 'products/macbook-pro-14.jpg',
                'price' => 45990000,
                'sale_price' => 42990000,
                'quantity' => 20,
                'status' => 1,
                'description' => 'MacBook Pro 14 inch với chip M3, 16GB RAM, 512GB SSD, màn hình Liquid Retina XDR',
                'category_id' => 2
            ],
            [
                'name' => 'Dell XPS 13 Plus',
                'image' => 'products/dell-xps-13.jpg',
                'price' => 35990000,
                'sale_price' => 32990000,
                'quantity' => 15,
                'status' => 1,
                'description' => 'Dell XPS 13 Plus với Intel Core i7, 16GB RAM, 512GB SSD, màn hình 13.4 inch OLED',
                'category_id' => 2
            ],
            [
                'name' => 'ASUS ROG Strix G15',
                'image' => 'products/asus-rog-g15.jpg',
                'price' => 28990000,
                'sale_price' => 25990000,
                'quantity' => 10,
                'status' => 1,
                'description' => 'ASUS ROG Strix G15 với AMD Ryzen 7, RTX 4060, 16GB RAM, màn hình 15.6 inch 144Hz',
                'category_id' => 2
            ],

            // Máy tính để bàn
            [
                'name' => 'iMac 24 inch M3',
                'image' => 'products/imac-24.jpg',
                'price' => 39990000,
                'sale_price' => 36990000,
                'quantity' => 12,
                'status' => 1,
                'description' => 'iMac 24 inch với chip M3, 8GB RAM, 256GB SSD, màn hình 4.5K Retina',
                'category_id' => 2
            ],
            [
                'name' => 'Dell OptiPlex 7000',
                'image' => 'products/dell-optiplex.jpg',
                'price' => 18990000,
                'sale_price' => 0,
                'quantity' => 8,
                'status' => 1,
                'description' => 'Dell OptiPlex 7000 với Intel Core i7, 16GB RAM, 512GB SSD, Windows 11 Pro',
                'category_id' => 2
            ],

            // Phụ kiện điện tử
            [
                'name' => 'AirPods Pro 2',
                'image' => 'products/airpods-pro-2.jpg',
                'price' => 6990000,
                'sale_price' => 5990000,
                'quantity' => 100,
                'status' => 1,
                'description' => 'AirPods Pro 2 với chống ồn chủ động, âm thanh không gian, chống nước IPX4',
                'category_id' => 3
            ],
            [
                'name' => 'Samsung Galaxy Buds2 Pro',
                'image' => 'products/galaxy-buds2-pro.jpg',
                'price' => 4990000,
                'sale_price' => 3990000,
                'quantity' => 80,
                'status' => 1,
                'description' => 'Samsung Galaxy Buds2 Pro với chống ồn thông minh, âm thanh 24bit, chống nước IPX7',
                'category_id' => 3
            ],
            [
                'name' => 'Apple Watch Series 9',
                'image' => 'products/apple-watch-9.jpg',
                'price' => 9990000,
                'sale_price' => 8990000,
                'quantity' => 40,
                'status' => 1,
                'description' => 'Apple Watch Series 9 với chip S9, màn hình Always-On, theo dõi sức khỏe nâng cao',
                'category_id' => 3
            ],

            // Âm thanh & Nhạc
            [
                'name' => 'Sony WH-1000XM5',
                'image' => 'products/sony-wh1000xm5.jpg',
                'price' => 8990000,
                'sale_price' => 7990000,
                'quantity' => 25,
                'status' => 1,
                'description' => 'Sony WH-1000XM5 với chống ồn hàng đầu, pin 30 giờ, âm thanh chất lượng cao',
                'category_id' => 3
            ],
            [
                'name' => 'JBL Flip 6',
                'image' => 'products/jbl-flip-6.jpg',
                'price' => 2990000,
                'sale_price' => 2490000,
                'quantity' => 60,
                'status' => 1,
                'description' => 'JBL Flip 6 loa bluetooth di động, chống nước IPX7, pin 12 giờ',
                'category_id' => 3
            ],

            // Máy ảnh & Quay phim
            [
                'name' => 'Canon EOS R6 Mark II',
                'image' => 'products/canon-eos-r6.jpg',
                'price' => 45990000,
                'sale_price' => 41990000,
                'quantity' => 5,
                'status' => 1,
                'description' => 'Canon EOS R6 Mark II mirrorless, 24.2MP, quay video 4K 60fps, chống rung 5 trục',
                'category_id' => 3
            ],
            [
                'name' => 'GoPro Hero 11 Black',
                'image' => 'products/gopro-hero-11.jpg',
                'price' => 9990000,
                'sale_price' => 8990000,
                'quantity' => 30,
                'status' => 1,
                'description' => 'GoPro Hero 11 Black quay video 5.3K, chống nước 10m, màn hình cảm ứng 2.27 inch',
                'category_id' => 3
            ],

            // Gaming & Console
            [
                'name' => 'PlayStation 5',
                'image' => 'products/ps5.jpg',
                'price' => 12990000,
                'sale_price' => 11990000,
                'quantity' => 15,
                'status' => 1,
                'description' => 'PlayStation 5 với SSD 825GB, hỗ trợ 4K 120fps, DualSense controller',
                'category_id' => 3
            ],
            [
                'name' => 'Nintendo Switch OLED',
                'image' => 'products/nintendo-switch-oled.jpg',
                'price' => 8990000,
                'sale_price' => 7990000,
                'quantity' => 20,
                'status' => 1,
                'description' => 'Nintendo Switch OLED với màn hình 7 inch OLED, pin 4.5-9 giờ, Joy-Con controllers',
                'category_id' => 3
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
