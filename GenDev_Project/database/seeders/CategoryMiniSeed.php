<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryMini;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryMiniSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $parentCategory = Category::all()->keyBy('name');
        $categoryMini = [
           ['name'=>'iphone','image'=>'https://pos.nvncdn.com/86c7ad-50310/art/artCT/20211027_SGT3ArCE9R2xD71THFLdDSCD.jpg', 'category_id'=> $parentCategory['Điện thoại']->id, 'status'=> 1 ],
           ['name'=>'samsung','image'=>'https://img.global.news.samsung.com/vn/wp-content/uploads/2019/03/Galaxy-A50-Mat-truoc-3.jpg','category_id'=> $parentCategory['Điện thoại']->id, 'status'=>1],
           ['name'=>'Macbook','image'=>'https://netphukien.com/wp-content/uploads/op-lung-jcpal-macguard-macbook-pro-2021-m1-9ff-01-768x768.jpeg','category_id'=> $parentCategory['Laptop']->id,'status'=>1],
           ['name'=>'Tai nghe','image'=>'https://3gwifi.net/wp-content/uploads/2022/05/vtalk-ear-600x600.jpg','category_id'=> $parentCategory['Phụ kiện']->id,'status'=>1]
        ];
        foreach($categoryMini as $data){
             CategoryMini::create($data);
        }
    }
}
