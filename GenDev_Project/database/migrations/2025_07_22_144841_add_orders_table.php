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
        //
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('subtotal', 15, 2)->nullable()->after('total'); // total before shipping & discounts
            $table->decimal('product_discount', 15, 2)->default(0)->after('shipping_fee');
            $table->decimal('shipping_discount', 15, 2)->default(0)->after('product_discount');
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
