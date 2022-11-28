<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacora4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora4', function (Blueprint $table) {
            $table->integer('id_bitacora4')->primary();
            $table->dateTime('fecha_hora');
            $table->string('accion', 100);
            $table->string('descripcion', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora4');
    }
}
