<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\CategoryMini;


class CategoryMiniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Danh sách tên danh mục con thực tế cho từng danh mục cha
        $categoryMinis = [
            'Điện thoại' => [
                ['name' => 'iPhone', 'image' => 'https://down-vn.img.susercontent.com/file/daa08280bc4359e7f8bc00efdea89572.webp'],
                ['name' => 'Samsung', 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m7gu8s2veq6496.webp'],
                ['name' => 'Xiaomi', 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-manlhcrcwl3s1e.webp'],
            ],
            'Laptop' => [
                ['name' => 'Asus', 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-majltj5ywa6k64.webp'],
                ['name' => 'Dell', 'image' => 'hhttps://down-vn.img.susercontent.com/file/vn-11134201-7ras8-m2m875nphj96ee.webp'],
                ['name' => 'HP', 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-m4sqkqhgrak600.webp'],
            ],
            'Phụ kiện' => [
                ['name' => 'Tai nghe', 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m9bd5bmwgoxwe8.webp'],
                ['name' => 'Sạc dự phòng', 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mbnl0d05gz1c28.webp'],
                ['name' => 'Ốp lưng', 'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rdy6-lzm23mc6vhnw40.webp'],
            ],
            'Máy tính bảng' => [
                ['name' => 'iPad', 'image' => 'https://down-vn.img.susercontent.com/file/sg-11134301-7rd5f-lv4cuu1lm5yl46.webp'],
                ['name' => 'Samsung Tab', 'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rfg7-m9forlzerr1eb7.webp'],
                ['name' => 'Lenovo Tab', 'image' => 'https://cdn.tgdd.vn/Products/Images/522/299454/lenovo-tab-p12-600x600.jpg'],
            ],
            'Tivi' => [
                ['name' => 'Sony', 'image' => 'https://cdn.tgdd.vn/Products/Images/1942/299454/sony-bravia-55-600x600.jpg'],
                ['name' => 'LG', 'image' => 'https://cdn.tgdd.vn/Products/Images/1942/299454/lg-oled-48-600x600.jpg'],
                ['name' => 'Samsung', 'image' => 'https://cdn.tgdd.vn/Products/Images/1942/299454/samsung-qled-65-600x600.jpg'],
            ],
            'Âm thanh' => [
                ['name' => 'Loa Bluetooth', 'image' => 'https://cdn.tgdd.vn/Products/Images/2162/299454/jbl-bluetooth-600x600.jpg'],
                ['name' => 'Tai nghe không dây', 'image' => 'https://cdn.tgdd.vn/Products/Images/2162/299454/sony-wf-1000xm4-600x600.jpg'],
                ['name' => 'Amply', 'image' => 'https://cdn.tgdd.vn/Products/Images/2162/299454/denon-amply-600x600.jpg'],
            ],
            'Máy ảnh' => [
                ['name' => 'Canon', 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/299454/canon-eos-r8-600x600.jpg'],
                ['name' => 'Nikon', 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/299454/nikon-z6-ii-600x600.jpg'],
                ['name' => 'Sony', 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/299454/sony-alpha-a7-iv-600x600.jpg'],
            ],
            'Đồng hồ' => [
                ['name' => 'Đồng hồ thông minh', 'image' => 'https://placehold.co/100x100?text=Smartwatch'],
                ['name' => 'Đồng hồ thời trang', 'image' => 'https://placehold.co/100x100?text=Fashion+Watch'],
                ['name' => 'Đồng hồ trẻ em', 'image' => 'https://placehold.co/100x100?text=Kids+Watch'],
            ],
            'Thiết bị mạng' => [
                ['name' => 'Router Wifi', 'image' => 'https://placehold.co/100x100?text=Router+Wifi'],
                ['name' => 'Bộ phát sóng', 'image' => 'https://placehold.co/100x100?text=Repeater'],
                ['name' => 'Switch mạng', 'image' => 'https://placehold.co/100x100?text=Switch'],
            ],
            'Máy in' => [
                ['name' => 'Máy in laser', 'image' => 'https://placehold.co/100x100?text=Laser+Printer'],
                ['name' => 'Máy in phun', 'image' => 'https://placehold.co/100x100?text=Inkjet+Printer'],
                ['name' => 'Máy in đa năng', 'image' => 'https://placehold.co/100x100?text=All-in-one+Printer'],
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