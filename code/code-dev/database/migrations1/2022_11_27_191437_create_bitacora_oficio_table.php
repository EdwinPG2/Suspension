<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraOficioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_oficio', function (Blueprint $table) {
            $table->integer('id_bitacora3')->primary();
            $table->string('destinatario', 50);
            $table->string('saludo', 250);
            $table->string('lugar', 50);
            $table->string('correlativo', 250);
            $table->date('fecha');
            $table->string('despedida', 250);
            $table->string('estado', 20);
            $table->bigInteger('users_id_creador');
            $table->bigInteger('users_id_revisor')->nullable();
            $table->date('fecha_revision')->nullable();
            $table->integer('clinica_servicio');
            $table->integer('id_oficio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_oficio');
    }
}
