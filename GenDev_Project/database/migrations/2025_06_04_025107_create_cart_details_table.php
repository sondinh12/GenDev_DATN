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
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cart_id");
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("variant_id")->nullable();
            $table->decimal("price", 10, 2)->nullable();
            $table->integer("quantity");
            $table->timestamps();

            // foreign key
            $table->foreign("cart_id")->references("id")->on("carts");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("variant_id")->references("id")->on("product_variants")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_details');
    }
};
