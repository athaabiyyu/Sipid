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
        Schema::create('s_penilaian_kriteria', function (Blueprint $table) {
            $table->id('penilaian_kriteria_id');
            $table->unsignedBigInteger('kriteria_id')->index(); // Ensure the type matches the referenced table
            $table->string('level_keparahan')->nullable();
            $table->text('deskripsi_penilaian_kriteria');
            $table->integer('skor_penilaian_kriteria'); 
            $table->timestamps();

            $table->foreign('kriteria_id')->references('kriteria_id')->on('s_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_penilaian_kriteria');
    }
};
