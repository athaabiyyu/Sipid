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
        Schema::create('s_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('level_id')->index();
            $table->string('user_nik', 16)->unique();
            $table->string('user_password');
            $table->string('user_nama', 50);
            $table->string('user_nomor', 12)->nullable();
            $table->string('user_alamat', 100)->nullable();
            $table->string('user_foto')->nullable();
            $table->timestamps();

            $table->foreign('level_id')->references('level_id')->on('s_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_user');
    }
};
