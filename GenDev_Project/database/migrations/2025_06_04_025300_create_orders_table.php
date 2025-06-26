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

            $table->unsignedBigInteger("coupon_id")->nullable();
            $table->unsignedBigInteger("shipping_id");
            $table->string("name",255);
            $table->string("email",255);
            $table->string("phone",20);
            $table->string("address",255);
            $table->string("city",255);
            $table->string("ward",255);
            $table->string('postcode',255);
            $table->tinyInteger('payment');
            $table->decimal('total',10,2);
            $table->decimal('shipping_fee', 10, 2)->default(0);
            $table->tinyInteger("status")->default(1);
            $table->timestamps();

            //fk
            $table->foreign("shipping_id")->references("id")->on("ships");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("coupon_id")->references("id")->on("coupons")->onDelete('set null');
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
