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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('coupon_id')->nullable()->constrained()->onDelete('set null');
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
            $table->decimal('total', 15, 2);
            $table->decimal('shipping_fee', 10, 2)->default(0);
            $table->string('transaction_code')->unique()->nullable();

            $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])->default('pending');

            $table->timestamps();
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
