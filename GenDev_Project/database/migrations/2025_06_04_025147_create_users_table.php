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
            $table->string("name", 255)->nullable(false);
            $table->string("avatar", 255)->nullable();
            $table->string("address", 255)->nullable();
            $table->string("email", 255)->unique();
            $table->dateTime("email_verified_at")->nullable();
            $table->string("phone", 20)->nullable(false);
            $table->string("password", 255)->nullable(false);
            $table->enum("gender", ["Nam", "Nữ", "Khác"])->nullable(false);
            $table->tinyInteger("status")->default(1);
            $table->tinyInteger("role")->default(1);
            $table->rememberToken();
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
