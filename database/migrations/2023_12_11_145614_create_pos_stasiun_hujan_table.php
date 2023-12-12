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
    public function up()
    {
        Schema::create('stasiun_hujan', function (Blueprint $table) {
            $table->id()->autoIncrement()->index();
            $table->string('nama_pos')->index();
            $table->decimal('batas_hujan_ringan');
            $table->decimal('batas_hujan_sedang');
            $table->decimal('batas_hujan_berat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stasiun_hujan');
    }
};
