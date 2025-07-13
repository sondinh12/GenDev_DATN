<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            ["name" => "Điện thoại", 'image' => 'https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture/News/News_expe_3183/3183.png?version=081600', "status" => 1],
            ["name" => "Laptop", 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1Y3UzcFYYhF5XKLoJp4e5F5IfCDuUD9zFsw&s', "status" => 1],
            ["name" => "Phụ kiện", 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaloOxVK8t78JGSCTPF2kAXM_n2q5yWIj7IQ&s', "status" => 1],
            ["name" => "Máy tính bảng", 'image' => 'https://cdn.tgdd.vn/Products/Images/522/253516/samsung-galaxy-tab-a7-lite-600x600.jpg', "status" => 1],
            ["name" => "Tivi", 'image' => 'https://cdn.tgdd.vn/Products/Images/1942/248096/smart-tivi-lg-4k-43-inch-43uq7550psf-600x600.jpg', "status" => 1],
            ["name" => "Âm thanh", 'image' => 'https://cdn.tgdd.vn/Products/Images/2162/248096/loa-bluetooth-sony-srs-xb13-600x600.jpg', "status" => 1],
            ["name" => "Máy ảnh", 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/248096/may-anh-canon-eos-m50-mark-ii-600x600.jpg', "status" => 1],
            ["name" => "Thiết bị đeo thông minh", 'image' => 'https://cdn.tgdd.vn/Products/Images/7077/248096/dong-ho-thong-minh-apple-watch-se-2022-600x600.jpg', "status" => 1],
            ["name" => "Thiết bị mạng", 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/248096/thiet-bi-mang-tp-link-600x600.jpg', "status" => 1],
            ["name" => "Máy in", 'image' => 'https://cdn.tgdd.vn/Products/Images/4727/248096/may-in-canon-600x600.jpg', "status" => 1],
        ];

        foreach ($category as $data) {
            Category::create($data);
        }
    }
}
