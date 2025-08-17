<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryMini;

class CategoryMiniSeeder extends Seeder
{
    public function run(): void
    {
        // Danh sách tên danh mục con thực tế cho từng danh mục cha
        $categoryMinis = [
            'Điện thoại' => [
                ['name' => 'iPhone', 'image' => 'category_mini/daa08280bc4359e7f8bc00efdea89572.webp'],
                ['name' => 'Samsung', 'image' => 'category_mini/vn-11134207-7ra0g-m7gu8s2veq6496.webp'],
                ['name' => 'Xiaomi', 'image' => 'category_mini/vn-11134207-7ras8-manlhcrcwl3s1e.webp'],
            ],
            'Laptop' => [
                ['name' => 'Asus', 'image' => 'category_mini/vn-11134207-7ra0g-majltj5ywa6k64.webp'],
                ['name' => 'Dell', 'image' => 'category_mini/vn-11134201-7ras8-m2m875nphj96ee.webp'],
                ['name' => 'HP', 'image' => 'category_mini/vn-11134207-7ras8-m4sqkqhgrak600.webp'],
            ],
            'Phụ kiện' => [
                ['name' => 'Tai nghe', 'image' => 'category_mini/vn-11134207-7ra0g-m9bd5bmwgoxwe8.webp'],
                ['name' => 'Sạc dự phòng', 'image' => 'category_mini/vn-11134207-7ras8-mbnl0d05gz1c28.webp'],
                ['name' => 'Ốp lưng', 'image' => 'category_mini/sg-11134201-7rdy6-lzm23mc6vhnw40.webp'],
            ],
            'Máy tính bảng' => [
                ['name' => 'iPad', 'image' => 'category_mini/sg-11134301-7rd5f-lv4cuu1lm5yl46.webp'],
                ['name' => 'Samsung Tab', 'image' => 'category_mini/sg-11134201-7rfg7-m9forlzerr1eb7.webp'],
                ['name' => 'Lenovo Tab', 'image' => 'category_mini/vn-11134207-7ras8-mcei9aydxzs3ca.webp'],
            ],
            'Tivi' => [
                ['name' => 'Sony', 'image' => 'category_mini/sg-11134201-7ratr-mafoann9as7kcc@resize_w900_nl.webp'],
                ['name' => 'LG', 'image' => 'category_mini/sg-11134201-7rfgm-m9wuf4frhfl8fd.webp'],
                ['name' => 'Samsung', 'image' => 'category_mini/vn-11134207-7ras8-mbjh2k3xj2v88a.webp'],
            ],
            'Âm thanh' => [
                ['name' => 'Loa Bluetooth', 'image' => 'category_mini/vn-11134207-7ra0g-m78ydreo49di93.webp'],
                ['name' => 'Tai nghe không dây', 'image' => 'category_mini/vn-11134207-7ras8-md38m3ty3d0c29.webp'],
                ['name' => 'Amply', 'image' => 'category_mini/sg-11134201-7rfgs-m9tttw0yd6dr98.webp'],
            ],
            'Máy ảnh' => [
                ['name' => 'Canon', 'image' => 'category_mini/vn-11134207-7ras8-mcm9wtteb09uaa.webp'],
                ['name' => 'Nikon', 'image' => 'category_mini/vn-11134201-7ras8-mc20daeclz9x0a.webp'],
                ['name' => 'Sony', 'image' => 'category_mini/vn-11134207-7ras8-m3et2rtfuoq0a6.webp'],
            ],
            'Đồng hồ' => [
                ['name' => 'Đồng hồ thông minh', 'image' => 'category_mini/vn-11134258-7ras8-mdd28z3op0m42d.png'],
                ['name' => 'Đồng hồ thời trang', 'image' => 'category_mini/vn-11134207-7ra0g-m9tvgmkpxwg213.webp'],
                ['name' => 'Đồng hồ trẻ em', 'image' => 'category_mini/vn-11134207-7ra0g-m7gc3thcgvg30f.webp'],
            ],
            'Thiết bị mạng' => [
                ['name' => 'Router Wifi', 'image' => 'category_mini/vn-11134207-7ra0g-m9v9ttnzqz2y82.webp'],
                ['name' => 'Bộ phát sóng', 'image' => 'category_mini/vn-11134207-7ras8-mde7dg39095o32.webp'],
                ['name' => 'Switch mạng', 'image' => 'category_mini/vn-11134258-7ras8-mdd295lv6b3h95.png'],
            ],
            'Máy in' => [
                ['name' => 'Máy in laser', 'image' => 'category_mini/vn-11134207-7ras8-md1h9s1j4skte6.webp'],
                ['name' => 'Máy in phun', 'image' => 'category_mini/vn-11134207-7ra0g-m9pa5bl6gojo74.webp'],
                ['name' => 'Máy in đa năng', 'image' => 'category_mini/vn-11134207-7ras8-maryu2rfyod418.webp'],
            ],
        ];

        $categories = Category::all();
        foreach ($categories as $category) {
            $minis = $categoryMinis[$category->name] ?? [];
            foreach ($minis as $mini) {
                CategoryMini::create([
                    'category_id' => $category->id,
                    'name' => $mini['name'],
                    'image' => $mini['image'],
                    'status' => 1,
                ]);
            }
        }
    }
}