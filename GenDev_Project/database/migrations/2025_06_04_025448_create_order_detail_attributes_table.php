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
        Schema::create('order_detail_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_detail_id");
            $table->string("attribute_name",255);
            $table->string("attribute_value",255);
            $table->timestamps();

            // fk
            $table->foreign("order_detail_id")->references("id")->on("order_details");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail_attributes');
    }
};
