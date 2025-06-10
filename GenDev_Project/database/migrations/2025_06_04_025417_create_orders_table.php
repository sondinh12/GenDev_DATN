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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("variant_id");
            $table->unsignedBigInteger("order_detail_id");
            $table->unsignedBigInteger("coupon_id");
            $table->string("name",255);
            $table->string("email",255);
            $table->string("phone",20);
            $table->string("address",255);
            $table->tinyInteger("status")->default(1);
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("variant_id")->references("id")->on("product_variants");
            $table->foreign("order_detail_id")->references("id")->on("order_details");
            $table->foreign("coupon_id")->references("id")->on("coupons");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
