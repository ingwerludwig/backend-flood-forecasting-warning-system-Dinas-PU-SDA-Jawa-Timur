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
            $table->decimal('prediksi_level_muka_air_purwodadi_lstm')->nullable();
            $table->decimal('prediksi_level_muka_air_purwodadi_gru')->nullable();
            $table->decimal('prediksi_level_muka_air_purwodadi_tcn')->nullable();
            $table->decimal('prediksi_level_muka_air_dhompo_lstm')->nullable();
            $table->decimal('prediksi_level_muka_air_dhompo_gru')->nullable();
            $table->decimal('prediksi_level_muka_air_dhompo_tcn')->nullable();
            $table->string('status_muka_air')->index();
            $table->unsignedBigInteger('id_awlr_arr_per_jam')->nullable()->index();
            $table->foreign('id_awlr_arr_per_jam')->references('id')->on('awlr_arr_per_jam');
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
