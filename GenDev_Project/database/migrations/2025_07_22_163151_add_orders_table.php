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
                    // Support 2 coupons
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('product_coupon_id')->nullable()->constrained('coupons')->onDelete('set null')->after('user_id');
            $table->foreignId('shipping_coupon_id')->nullable()->constrained('coupons')->onDelete('set null')->after('product_coupon_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            
        });
    }
};
