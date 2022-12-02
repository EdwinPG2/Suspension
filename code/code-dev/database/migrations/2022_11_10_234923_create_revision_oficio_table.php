<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionOficioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_oficio', function (Blueprint $table) {
            $table->integer('id_revision_oficio',true);
            $table->date('fecha_rev');
            $table->integer('id_oficio');
            $table->unsignedBigInteger('users_id');
            
            $table->foreign('id_oficio', 'fk_revision_oficio1')->references('id_oficio')->on('oficio')->onDelete('cascade');
            $table->foreign('users_id', 'fk_revision_oficio_users1')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revision_oficio');
    }
}
