<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Tin tức'],
            ['name' => 'Hướng dẫn'],
            ['name' => 'Thông báo'],
            ['name' => 'Sự kiện'],
        ];

        foreach ($categories as $category) {
            PostCategory::create($category);
        }
    }
}
