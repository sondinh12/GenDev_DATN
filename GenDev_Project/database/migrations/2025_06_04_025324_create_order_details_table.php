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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->decimal("price",10,2);
            $table->integer('quantity');
            $table->text("note")->nullable();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("variant_id")->nullable();

            $table->timestamps();

            // fk
            $table->foreign("order_id")->references("id")->on("orders");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("variant_id")->references("id")->on("product_variants");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
