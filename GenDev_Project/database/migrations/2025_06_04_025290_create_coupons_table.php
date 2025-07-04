<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            // -1 là không giới hạn người dùng, 0 là không ai được dùng
            $table->integer('user_id')->default(-1);
            $table->string("name", 255);
            $table->string("coupon_code", 20)->unique();
            $table->enum('discount_type', ['percent', 'fixed']);
            $table->decimal('discount_amount', 10, 2);
            $table->dateTime("start_date");
            $table->dateTime("end_date");

            // $table->integer("quantity"); <-- đã loại bỏ

            $table->tinyInteger("status")->default(1);
            $table->decimal("max_coupon", 10, 2);
            $table->decimal("min_coupon", 10, 2);

            $table->integer("usage_limit");
            $table->integer("per_use_limit")->default(-1);
            $table->integer("total_used")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
