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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("avatar", 255);
            $table->string("address", 255);
            $table->string("email", 255);
            $table->dateTime("email_verified_at")->nullable();
            $table->string("phone", 20);
            $table->string("password", 255);
            $table->enum("gender", ["Nam", "Nữ", "Khác"]);
            $table->tinyInteger("status")->default(1);
            $table->tinyInteger("role")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
