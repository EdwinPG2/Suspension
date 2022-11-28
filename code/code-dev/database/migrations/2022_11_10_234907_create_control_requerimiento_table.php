<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlRequerimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_requerimiento', function (Blueprint $table) {
            $table->integer('id_control_requerimiento')->primary();
            $table->string('codigo_requerimiento', 50);
            $table->date('fecha_registro');
            $table->string('url_pdf', 10000);
            $table->string('observacones', 100)->nullable();
            $table->string('estado', 20);
            $table->unsignedBigInteger('users_id');
            
            $table->foreign('users_id', 'fk_control_requerimiento_users1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_requerimiento');
    }
}
