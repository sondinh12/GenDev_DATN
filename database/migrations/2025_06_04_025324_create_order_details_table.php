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
            $table->decimal("amount",10,2);
            $table->text("note");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("shipping_id");
            $table->timestamps();

            // fk
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("shipping_id")->references("id")->on("ships");
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
