<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts_history', function (Blueprint $table) {
            $table->id();

            // Liên kết tới bảng posts
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete();

            // Liên kết tới bảng users
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Lưu danh sách trường đã chỉnh sửa
            $table->json('fields_changed')->nullable();

            // Lưu giá trị cũ
            $table->json('old_value')->nullable();

            // Lưu giá trị mới
            $table->json('new_value')->nullable();

            // Thời gian chỉnh sửa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_history');
    }
};
