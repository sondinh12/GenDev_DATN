<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::dropIfExists('reviews');
    }
    public function down() {
        // Nếu muốn khôi phục lại bảng, có thể tạo lại ở đây
        // Schema::create('reviews', function (Blueprint $table) { ... });
    }
};
