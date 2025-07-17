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
            ["name" => "Điện thoại", 'image' => 'categories/dienthoai.jpg', "status" => 1],
            ["name" => "Laptop", 'image' => 'categories/laptop.jpg', "status" => 1],
            ["name" => "Phụ kiện", 'image' => 'categories/phukien.jpg', "status" => 1],
        ];

        foreach ($category as $data) {
            Category::create($data);
        }
    }
}
