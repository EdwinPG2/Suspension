<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfiliadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliado', function (Blueprint $table) {
            $table->integer('no_afiliado')->primary();
            $table->string('cui', 100);
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 15);
            $table->string('direccion', 50)->nullable();
            $table->string('genero', 15)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('ibm', 20)->nullable();
            $table->integer('id_tipo_afiliado')->nullable();
            $table->string('dependencia')->nullable();
            $table->integer('id_cargo')->nullable();
            $table->enum('colaborador', ['y', 'n'])->nullable();
            
            $table->foreign('id_cargo', 'afiliado_ibfk_2')->references('id_cargo')->on('cargo')->onDelete('cascade');
            $table->foreign('id_tipo_afiliado', 'fk_afiliado_tipo_afiliado1')->references('Id_tipo_afiliado')->on('tipo_afiliado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afiliado');
    }
}
