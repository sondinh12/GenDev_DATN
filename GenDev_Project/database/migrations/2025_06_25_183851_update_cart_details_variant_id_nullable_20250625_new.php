<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCartDetailsVariantIdNullable20250625New extends Migration
{
    public function up(): void
    {
        Schema::table('cart_details', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['variant_id']);
            // Sửa cột variant_id
            $table->bigInteger('variant_id')->nullable()->change();
            // Thêm lại khóa ngoại
            $table->foreign('variant_id')->references('id')->on('product_variants')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('cart_details', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['variant_id']);
            // Đặt lại cột variant_id
            $table->bigInteger('variant_id')->nullable(false)->change();
            // Thêm lại khóa ngoại
            $table->foreign('variant_id')->references('id')->on('product_variants')->onDelete('cascade');
        });
    }
}
