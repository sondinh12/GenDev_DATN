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
        Schema::table('attribute_values', function (Blueprint $table) {
            $table->bigInteger('attribute_id')->unsigned()->change();
            $table->foreign("attribute_id")->references("id")->on("attributes");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attribute_values', function (Blueprint $table) {
            $table->dropForeign("attribute_values_attribute_id_foreign");
            $table->bigInteger('attribute_id')->change();
        });
    }
};
