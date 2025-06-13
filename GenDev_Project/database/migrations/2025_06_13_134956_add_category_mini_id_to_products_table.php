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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_mini_id')->nullable()->after('category_id')->constrained('categories_mini');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_mini_id']);
            $table->dropColumn('category_mini_id');
        });
    }
};
