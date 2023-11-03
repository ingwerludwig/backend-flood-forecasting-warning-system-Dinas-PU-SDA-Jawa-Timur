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
        Schema::create('hasil_prediksi', function (Blueprint $table) {
            $table->id()->autoIncrement()->index();
            $table->decimal('prediksi_level_muka_air')->nullable()->index();
            $table->unsignedBigInteger('id_data_awlr_per_jam')->nullable()->index();
            $table->foreign('id_data_awlr_per_jam')->references('id')->on('data_awlr_per_jam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_prediksi');
    }
};
