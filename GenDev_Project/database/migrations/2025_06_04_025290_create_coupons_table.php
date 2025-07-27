<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            // -1: toàn bộ hệ thống, 0: mã tri ân
            $table->integer('user_id')->default(-1);
            $table->string("name", 255);

            // chỉ còn coupon_code, không cần shipping_code
            $table->string("coupon_code", 20)->unique();

            $table->enum('type', ['order', 'shipping'])->default('order');
            $table->enum('discount_type', ['percent', 'fixed']);

            $table->decimal('discount_amount', 10, 2);
            $table->dateTime("start_date");
            $table->dateTime("end_date");

            $table->tinyInteger('status')->default(1)->comment('0: Tạm dừng, 1: Hoạt động, 2: Đã hết hạn');
            $table->decimal("max_coupon", 10, 2);
            $table->decimal("min_coupon", 10, 2);
            $table->integer("usage_limit");
            $table->integer("per_use_limit")->default(-1);
            $table->integer("total_used")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
