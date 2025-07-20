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
            ["name" => "Điện thoại", 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m9o7ct255au2d5.webp', "status" => 1],
            ["name" => "Laptop", 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mbnzkoyssb661b.webp', "status" => 1],
            ["name" => "Phụ kiện", 'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rdwv-mc8quswrinht08.webp', "status" => 1],
            ["name" => "Máy tính bảng", 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-mato1vi88u6w17.webp', "status" => 1],
            ["name" => "Tivi", 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ra0g-m9pc5nyn9xy268.webp', "status" => 1],
            ["name" => "Âm thanh", 'image' => 'https://down-vn.img.susercontent.com/file/sg-11134301-7rd5d-lwzgyh9v7ai106.webp', "status" => 1],
            ["name" => "Máy ảnh", 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lwccgby4iaqh5a.webp', "status" => 1],
            ["name" => "Đồng hồ", 'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rasd-mar297f4r052a6.webp', "status" => 1],
            ["name" => "Thiết bị mạng", 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lzleaoq84nrh8a.webp', "status" => 1],
            ["name" => "Máy in", 'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-m2nhg12trabq3f.webp', "status" => 1],
        ];

        foreach ($category as $data) {
            Category::create($data);
        }
    }
}
