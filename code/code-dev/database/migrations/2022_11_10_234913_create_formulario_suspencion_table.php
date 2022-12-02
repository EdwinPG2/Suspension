<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioSuspencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_suspencion', function (Blueprint $table) {
            $table->integer('id_suspencion',true);
            $table->integer('id_formulario');
            $table->integer('id_suspension');
            $table->string('estado', 20);
            
            $table->foreign('id_formulario', 'fk_formulario_suspencion_formulario1')->references('id_formulario')->on('formulario')->onDelete('cascade');
            $table->foreign('id_suspension', 'fk_formulario_suspencion_suspension1')->references('id_suspension')->on('suspension')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulario_suspencion');
    }
}
