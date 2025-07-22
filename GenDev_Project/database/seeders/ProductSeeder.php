<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\CategoryMini;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy danh mục cha và danh mục con
        $categories = Category::all()->keyBy('name');
        $minis = CategoryMini::all()->groupBy('category_id');

        $products = [

            // Điện thoại
            [
                'name' => 'iPhone 15 Pro Max',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-m44io289jumne6.webp',
                'price' => 30990000,
                'sale_price' => 28990000,
                'quantity' => 240,
                'status' => 1,
                'description' => 'iPhone 15 Pro Max flagship mới nhất của Apple.',
                'category_name' => 'Điện thoại',
                'mini_name' => 'iPhone',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rff3-m9r108ikhgv6df.webp',
                'price' => 27990000,
                'sale_price' => 25990000,
                'quantity' => 18,
                'status' => 1,
                'description' => 'Flagship Samsung Galaxy S24 Ultra.',
                'category_name' => 'Điện thoại',
                'mini_name' => 'Samsung',
            ],
            // Laptop
            [
                'name' => 'Asus Vivobook 16',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-ma9a8n27i3jc62.webp',
                'price' => 15990000,
                'sale_price' => 14490000,
                'quantity' => 45,
                'status' => 1,
                'description' => 'Laptop Asus Vivobook 16 màn hình lớn, chip i5.',
                'category_name' => 'Laptop',
                'mini_name' => 'Asus',
            ],
            [
                'name' => 'Dell XPS 13',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-makt8pyzj848cb.webp',
                'price' => 24990000,
                'sale_price' => 22990000,
                'quantity' => 28,
                'status' => 1,
                'description' => 'Laptop Dell XPS 13 cao cấp.',
                'category_name' => 'Laptop',
                'mini_name' => 'Dell',
            ],
            // Phụ kiện
            [
                'name' => 'Tai Nghe Lenovo',
                'image' => 'https://down-vn.img.susercontent.com/file/cn-11134207-7ras8-m59ux96d4gsxa1@resize_w900_nl.webp',
                'price' => 790000,
                'sale_price' => 670000,
                'quantity' => 340,
                'status' => 1,
                'description' => 'ai Nghe Bluetooth Lenovo TH60 ANC Giảm Tiếng Ồn Chủ Động - Tuổi Thọ Pin 28H.',
                'category_name' => 'Phụ kiện',
                'mini_name' => 'Tai nghe',
            ],
            [
                'name' => 'Sạc dự phòng Baseus',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lwmf0iifmd3t8f.webp',
                'price' => 1200000,
                'sale_price' => 990000,
                'quantity' => 425,
                'status' => 1,
                'description' => 'Sạc dự phòng Baseus dung lượng cao.',
                'category_name' => 'Phụ kiện',
                'mini_name' => 'Sạc dự phòng',
            ],
            // Máy tính bảng
            [
                'name' => 'iPad Air (M3)',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m7hvzyyz0igm60.webp',
                'price' => 14590000,
                'sale_price' => 13490000,
                'quantity' => 12,
                'status' => 1,
                'description' => 'iPad Air (M3) chip M1, màn hình 10.9 inch.',
                'category_name' => 'Máy tính bảng',
                'mini_name' => 'iPad',
            ],
            [
                'name' => 'Samsung Galaxy Tab S9',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-maq8xcm2x85o3e.webp',
                'price' => 20000000,
                'sale_price' => 18000000,
                'quantity' => 140,
                'status' => 1,
                'description' => 'Máy tính bảng Samsung Galaxy Tab S9.',
                'category_name' => 'Máy tính bảng',
                'mini_name' => 'Samsung Tab',
            ],
            // Tivi
            [
                'name' => 'Tivi Sony 4K',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mc1kcdjtcdslaf.webp',
                'price' => 17000000,
                'sale_price' => 15000000,
                'quantity' => 17,
                'status' => 1,
                'description' => 'Tivi Sony 4K 55 inch K-55S30 - Hàng chính hãng.',
                'category_name' => 'Tivi',
                'mini_name' => 'Sony',
            ],
            [
                'name' => 'Tivi LG 55 inch',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mbhhk5gdftxgb4.webp',
                'price' => 20000000,
                'sale_price' => 18000000,
                'quantity' => 26,
                'status' => 1,
                'description' => 'TTV thông minh LG 55 Inch OLED evo AI C5 4K.',
                'category_name' => 'Tivi',
                'mini_name' => 'LG',
            ],
            // Âm thanh
            [
                'name' => 'Loa Bluetooth JBL',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m9ijn4tl8sas5e.webp',
                'price' => 2500000,
                'sale_price' => 2200000,
                'quantity' => 430,
                'status' => 1,
                'description' => 'Loa Bluetooth JBL chất lượng cao.',
                'category_name' => 'Âm thanh',
                'mini_name' => 'Loa Bluetooth',
            ],
            [
                'name' => 'Loa Bluetooth Cyboris',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m6f9xpfnl8bc7e.webp',
                'price' => 2770000,
                'sale_price' => 2300000,
                'quantity' => 85,
                'status' => 1,
                'description' => 'Loa Bluetooth Cyboris X10, Công suất 120W, Loa siêu Bass, Chống nước IPX6, Pin 10000mAh.',
                'category_name' => 'Âm thanh',
                'mini_name' => 'Amply',
            ],
            // Máy ảnh
            [
                'name' => 'Máy ảnh Lomo',
                'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rfih-m9kfiaklfamp3f.webp',
                'price' => 1200000,
                'sale_price' => 900000,
                'quantity' => 543,
                'status' => 1,
                'description' => 'Máy ảnh Lomo chống nước MNTT Chụp ảnh Kawaii đầy màu sắc.',
                'category_name' => 'Máy ảnh',
                'mini_name' => 'Canon',
            ],
            [
                'name' => 'Instax Mini 12',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m7u96xguvesx8c@resize_w900_nl.webp',
                'price' => 3200000,
                'sale_price' => 2850000,
                'quantity' => 322,
                'status' => 1,
                'description' => 'Instax Mini 12 - Máy Chụp Ảnh Lấy Ngay Fujifilm Instax Mini 12 (Chính Hãng).',
                'category_name' => 'Máy ảnh',
                'mini_name' => 'Sony',
            ],
            // Đồng hồ
            [
                'name' => 'HUAWEI watch fit 3',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mccaqti4c6z6dc.webp',
                'price' => 2880000,
                'sale_price' => 2350000,
                'quantity' => 150,
                'status' => 1,
                'description' => 'Đồng hồ thông minh HUAWEI watch fit 3.',
                'category_name' => 'Đồng hồ',
                'mini_name' => 'Đồng hồ thông minh',
            ],
            [
                'name' => 'Đồng hồ Xiaomi Smart',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mbp4t2viye3989.webp',
                'price' => 2500000,
                'sale_price' => 2200000,
                'quantity' => 110,
                'status' => 1,
                'description' => 'Đồng hồ thông minh Xiaomi Smart Band 10 phiên bản gốm trắng ceramic.',
                'category_name' => 'Đồng hồ',
                'mini_name' => 'Đồng hồ thời trang',
            ],
            // Thiết bị mạng
            [
                'name' => 'TP-Link Router Wi-Fi 4G',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mbnct2du22cg19.webp',
                'price' => 900000,
                'sale_price' => 800000,
                'quantity' => 128,
                'status' => 1,
                'description' => 'Thiết bị định tuyến mạng không dây TP-Link Router Wi-Fi 4G LTE chuẩn N 300 Mbps TL-MR100.',
                'category_name' => 'Thiết bị mạng',
                'mini_name' => 'Router Wifi',
            ],
            [
                'name' => 'Switch TP-Link 8-Port',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mbnjpmhdmx509c@resize_w900_nl.webp',
                'price' => 700000,
                'sale_price' => 650000,
                'quantity' => 12,
                'status' => 1,
                'description' => 'Switch TP-Link 8-Port Gigabit Desktop Switch LS1008G - Hàng chính hãng.',
                'category_name' => 'Thiết bị mạng',
                'mini_name' => 'Switch mạng',
            ],
            // Máy in
            [
                'name' => 'Máy in laser CANON',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-ma2n2j08d1y247.webp',
                'price' => 3200000,
                'sale_price' => 2990000,
                'quantity' => 7,
                'status' => 1,
                'description' => 'Máy in laser trắng đen CANON LBP 6030 -Bảo hành 12 tháng.',
                'category_name' => 'Máy in',
                'mini_name' => 'Máy in laser',
            ],
            [
                'name' => 'Máy in Epson L3250',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-ma548lgiqwmg55.webp',
                'price' => 2500000,
                'sale_price' => 2200000,
                'quantity' => 6,
                'status' => 1,
                'description' => 'Máy in Epson L3250 -Bảo hành 24 tháng.',
                'category_name' => 'Máy in',
                'mini_name' => 'Máy in phun',

            ],
        ];

        foreach ($products as $product) {

            $category = $categories[$product['category_name']] ?? null;
            if (!$category) continue;
            $mini = $minis[$category->id]->firstWhere('name', $product['mini_name']) ?? null;
            if (!$mini) continue;
            $product['category_id'] = $category->id;
            $product['category_mini_id'] = $mini->id;
            unset($product['category_name'], $product['mini_name']);

            DB::table('products')->insert($product);
        }
    }
}