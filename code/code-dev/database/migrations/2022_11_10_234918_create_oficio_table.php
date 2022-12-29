<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOficioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficio', function (Blueprint $table) {
            $table->integer('id_oficio',true);
            $table->string('destinatario', 50);
            $table->string('saludo', 250);
            $table->string('lugar', 50);
            $table->string('correlativo', 250);
            $table->integer('clinica_servicio');
            $table->date('fecha');
            $table->string('despedida', 250);
            $table->string('estado', 20);
            $table->unsignedBigInteger('users_id_creador');
            $table->unsignedBigInteger('users_id_revisor')->nullable();
            $table->date('fecha_revision')->nullable();
            
            $table->foreign('clinica_servicio', 'fk_clinica_servicio1')->references('id_clinica_servicio')->on('clinica_servicio')->onDelete('cascade');
            $table->foreign('users_id_creador', 'fk_oficio_users1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('users_id_revisor', 'fk_oficio_users2')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficio');
    }
}
