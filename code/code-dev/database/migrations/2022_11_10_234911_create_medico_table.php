<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->string('colegiado', 10)->primary();
            $table->string('nombres', 45);
            $table->string('especialidad', 45);
            $table->string('telefono', 11)->nullable();
            $table->integer('id_especialidad')->nullable();
            
            $table->foreign('id_especialidad', 'fk_medico_especialidad1')->references('id_especialidad')->on('especialidad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico');
    }
}
