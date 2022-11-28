<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimiento', function (Blueprint $table) {
            $table->integer('id_requerimiento')->primary();
            $table->string('no_requerimiento', 50);
            $table->date('fecha_requerimiento');
            $table->date('fecha_envio');
            $table->string('estado', 20);
            $table->string('observaciones', 300)->nullable();
            $table->date('fecha_recepcion_regmed')->nullable();
            $table->integer('id_oficio');
            $table->integer('no_afiliado');
            $table->unsignedBigInteger('users_id_remitente');
            $table->unsignedBigInteger('users_id_responsable')->nullable();
            
            $table->foreign('no_afiliado', 'fk_requerimiento_afiliado1')->references('no_afiliado')->on('afiliado');
            $table->foreign('id_oficio', 'fk_requerimiento_oficio1')->references('id_oficio')->on('oficio');
            $table->foreign('users_id_remitente', 'fk_requerimiento_users1')->references('id')->on('users');
            $table->foreign('users_id_responsable', 'fk_requerimiento_users2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requerimiento');
    }
}
