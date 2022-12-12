<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaRequerimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_requerimiento', function (Blueprint $table) {
            $table->integer('id_respuesta_requerimiento',true);
            $table->integer('no_afiliado');
            $table->integer('id_requerimiento');
            $table->string('caso', 25)->nullable();
            $table->string('desino_nombre',50);
            $table->string('destino_area',50);
            $table->string('destino_lugar',50);
            $table->string('cuerpo',300);
            $table->string('nombre_usuario',50);
            $table->string('vobo',50);
            $table->string('folios',10);
            $table->unsignedBigInteger('users_id')->nullable();
            $table->integer('id_cargo')->nullable();
            $table->string('archivo',150)->nullable();


            $table->foreign('no_afiliado', 'fk_respuesta_requerimiento_afiliado1')->references('no_afiliado')->on('afiliado')->onDelete('cascade');
            $table->foreign('id_requerimiento', 'fk_respuesta_requerimiento_riquerimiento1')->references('id_requerimiento')->on('requerimiento')->onDelete('cascade');
            $table->foreign('users_id', 'fk_respuesta_requerimiento_users1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_cargo', 'fk_respuesta_requerimiento_cargo1')->references('id_cargo')->on('cargo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_requerimiento');
    }
}
