<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('awlr_arr_per_jam', function (Blueprint $table) {
            $table->id()->autoIncrement()->index();
            $table->decimal('curah_hujan_cendono')->nullable();
            $table->decimal('curah_hujan_lawang')->nullable();
            $table->decimal('level_muka_air_purwodadi')->nullable();
            $table->decimal('level_muka_air_dhompo')->nullable();
            $table->timestamp('tanggal')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awlr_arr_per_jam');
    }
};
