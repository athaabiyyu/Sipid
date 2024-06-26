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
        Schema::create('s_kriteria', function (Blueprint $table) {
            $table->id('kriteria_id');
            $table->string('kriteria_kode', 5)->unique();
            $table->string('kriteria_nama', 100);
            $table->float('kriteria_bobot');
            $table->string('kriteria_attribut');
            $table->integer('jumlah_deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_kriteria');
    }
};
