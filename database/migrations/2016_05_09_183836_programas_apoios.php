<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProgramasApoios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas_apoios_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao');
            $table->integer('apoio_tipo');
            $table->integer('programa_id')->unsigned();
            $table->timestamps();
            $table->foreign('programa_id')
                  ->references('id')
                  ->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('programas_apoios_documentos');
    }
}
