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
        Schema::create('data_awlr_per_jam', function (Blueprint $table) {
            $table->id()->autoIncrement()->index();
            $table->string('nama_stasiun');
            $table->decimal('level_muka_air')->index();;
            $table->decimal('elevasi_muka_air');
            $table->timestamp('tanggal')->index();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_awlr_per_jam');
    }
};
