<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicaServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinica_servicio', function (Blueprint $table) {
            $table->integer('id_clinica_servicio')->primary();
            $table->string('nombre', 50);
            $table->string('descripcion', 250);
            $table->integer('id_especialidad');
            $table->integer('id_area');
            $table->integer('correlativo')->default(1);
            $table->integer('correlativo_rechazado')->default(1);
            
            $table->foreign('id_area', 'fk_clinica/servicio_area1')->references('id_area')->on('area');
            $table->foreign('id_especialidad', 'fk_clinica/servicio_especialidad1')->references('id_especialidad')->on('especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinica_servicio');
    }
}
