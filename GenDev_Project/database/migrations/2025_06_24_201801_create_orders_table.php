<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Support 2 coupons
            $table->foreignId('product_coupon_id')->nullable()->constrained('coupons')->onDelete('set null');
            $table->foreignId('shipping_coupon_id')->nullable()->constrained('coupons')->onDelete('set null');

            $table->foreignId('shipping_id')->nullable()->constrained('ships')->onDelete('set null');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('ward');
            $table->string('postcode');

            $table->enum('payment', ['cod', 'banking'])->default('cod');
            $table->enum('payment_status', ['paid', 'unpaid', 'cancelled'])->default('unpaid');
            $table->timestamp('payment_expired_at')->nullable();

            $table->decimal('subtotal', 10, 2); // total before discounts
            $table->decimal('product_discount', 10, 2)->default(0);
            $table->decimal('shipping_discount', 10, 2)->default(0);
            $table->decimal('total', 10, 2); // final amount after all calculations

            $table->enum('status', ['pending', 'processing', 'shipping', 'return_requested', 'shipped', 'completed', 'cancelled'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
