<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecto_documentos', function (Blueprint $table) {
            $table->integer('projecto_id')->unsigned();     
            $table->integer('documento_id')->unsigned();     
            $table->foreign('projecto_id')
                  ->references('id')
                  ->on('projectos');
            $table->foreign('documento_id')
                  ->references('id')
                  ->on('programas_apoios_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projecto_documentos');
    }
}
