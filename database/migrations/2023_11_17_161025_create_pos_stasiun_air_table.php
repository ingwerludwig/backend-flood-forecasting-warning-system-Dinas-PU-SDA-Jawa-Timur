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
        Schema::create('stasiun_air', function (Blueprint $table) {
            $table->id()->autoIncrement()->index();
            $table->string('nama_pos')->index();
            $table->decimal('batas_air_siaga');
            $table->decimal('batas_air_awas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_stasiun_air');
    }
};
