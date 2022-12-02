<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevSuspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rev_susp', function (Blueprint $table) {
            $table->integer('id_rev_susp',true);
            $table->string('observacion', 250)->nullable();
            $table->integer('id_suspension');
            $table->integer('id_revision_oficio');
            
            $table->foreign('id_revision_oficio', 'fk_rev_susp_revision_oficio1')->references('id_revision_oficio')->on('revision_oficio')->onDelete('cascade');
            $table->foreign('id_suspension', 'fk_rev_susp_suspension1')->references('id_suspension')->on('suspension')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rev_susp');
    }
}
