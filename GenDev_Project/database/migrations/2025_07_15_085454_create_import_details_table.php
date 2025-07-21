<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('import_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('import_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->json('variant_data')->nullable(); // lưu biến thể tạm thời
            $table->string('product_temp_name')->nullable(); //lưu tên sp tạm thời
            $table->integer('quantity');
            $table->decimal('import_price',15,2);
            $table->decimal('subtotal',15,2);
            $table->timestamps();

            $table->foreign("import_id")->references("id")->on("imports");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("variant_id")->references("id")->on("product_variants");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_details');
    }
};
