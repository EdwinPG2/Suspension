<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraSuspensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_suspension', function (Blueprint $table) {
            $table->integer('id_bitacora2')->primary();
            $table->date('fecha_inicio_suspension');
            $table->date('fecha_fin_suspension');
            $table->date('fecha_alta');
            $table->dateTime('fecha_registro');
            $table->date('fecha_envio_prestacion');
            $table->date('fecha_recibido_prestacione');
            $table->date('fecha_revision');
            $table->string('observacion', 250);
            $table->string('estado', 20);
            $table->integer('no_afiliado');
            $table->integer('id_clinica_servicio');
            $table->string('medico_colegiado', 10);
            $table->bigInteger('users_id_registrador');
            $table->string('users_id_revisor', 20)->nullable();
            $table->date('fecha_inicio_caso');
            $table->dateTime('fecha_accidente');
            $table->integer('id_riesgo');
            $table->integer('id_suspension');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_suspension');
    }
}
