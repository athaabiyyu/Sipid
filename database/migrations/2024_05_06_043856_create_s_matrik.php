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
        Schema::create('s_matrik', function (Blueprint $table) {
            $table->id('matrik_id');
            $table->unsignedBigInteger('laporan_id')->index();
            $table->unsignedBigInteger('kriteria_id')->nullable()->index();
            $table->float('matrik_nilai')->nullable();
            $table->timestamps();
            
            $table->foreign('laporan_id')->references('laporan_id')->on('s_laporan');
            $table->foreign('kriteria_id')->references('kriteria_id')->on('s_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_matrik');
    }
};
