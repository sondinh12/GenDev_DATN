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
            ["name"=>"Điện thoại",'image' => 'https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture/News/News_expe_3183/3183.png?version=081600',"status" => 1],
            ["name"=>"Laptop",'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1Y3UzcFYYhF5XKLoJp4e5F5IfCDuUD9zFsw&s',"status" => 1],
            ["name"=>"Phụ kiện",'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaloOxVK8t78JGSCTPF2kAXM_n2q5yWIj7IQ&s',"status" => 1],
        ];
        
        foreach($category as $data){
            Category::create($data);
        }
    }
}

