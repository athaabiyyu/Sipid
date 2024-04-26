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
        Schema::create('s_laporan', function (Blueprint $table) {
            $table->id('laporan_id');
            $table->unsignedBigInteger('infrastruktur_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('status_id')->index();
            $table->date('tgl_laporan')->nullable();
            $table->string('bukti_laporan')->nullable();
            $table->string('deskripsi_laporan', 100)->nullable();
            $table->timestamps();

            $table->foreign('infrastruktur_id')->references('infrastruktur_id')->on('s_infrastruktur');
            $table->foreign('user_id')->references('user_id')->on('s_user');
            $table->foreign('status_id')->references('status_id')->on('s_status_laporan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_laporan');
    }
};
