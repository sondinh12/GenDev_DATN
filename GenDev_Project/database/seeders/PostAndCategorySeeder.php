<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;
use App\Models\Post;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostAndCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 5 danh mục
        $categories = [
            'Tin tức công nghệ',
            'Đánh giá sản phẩm',
            'Hướng dẫn sử dụng',
            'Khuyến mãi',
            'Khác',
        ];

        foreach ($categories as $name) {
            PostCategory::create(['name' => $name]);
        }

        // Lấy danh sách category_id để gán ngẫu nhiên
        $categoryIds = PostCategory::pluck('id')->toArray();

        // Tạo 10 bài viết
        for ($i = 1; $i <= 10; $i++) {
            $title = "Bài viết mẫu số $i";
            $slug = Str::slug($title) . '-' . Str::random(5);

            Post::create([
                'title' => $title,
                'thumbnail_url' => 'https://via.placeholder.com/640x480.png?text=Thumbnail+' . $i,
                'content' => 'Đây là nội dung bài viết mẫu số ' . $i . '.',
                'excerpt' => 'Đây là tóm tắt bài viết mẫu số ' . $i . '.',
                'slug' => $slug,
                'status' => 'published',
                'view' => rand(10, 100),
                'post_category_id' => $categoryIds[array_rand($categoryIds)],
                'published_at' => Carbon::now()->subDays(rand(0, 30)),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
                'updated_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        $this->command->info('✅ Đã thêm 5 danh mục và 10 bài viết mẫu thành công!');
    }
}
