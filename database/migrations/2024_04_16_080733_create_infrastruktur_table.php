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
        Schema::create('s_infrastruktur', function (Blueprint $table) {
            $table->id('infrastruktur_id');
            $table->string('infrastruktur_kode', 10)->unique();
            $table->string('infrastruktur_nama', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_infrastruktur');
    }
};
