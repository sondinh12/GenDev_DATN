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
        Schema::table('product_galleries', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned()->change();
            $table->foreign("product_id")->references("id")->on("products");  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_galleries', function (Blueprint $table) {
            $table->dropForeign("product_galleries_product_id_foreign");
            $table->bigInteger('product_id')->change();
        });
    }
};
