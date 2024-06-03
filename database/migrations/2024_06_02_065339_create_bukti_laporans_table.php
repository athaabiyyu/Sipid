<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bukti_laporans', function (Blueprint $table) {
        $table->id('bukti_laporan_id');
        $table->unsignedBigInteger('laporan_id')->index();
        $table->string('file_path');
        $table->timestamps();

        $table->foreign('laporan_id')->references('laporan_id')->on('s_laporan');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_laporans');
    }
};
