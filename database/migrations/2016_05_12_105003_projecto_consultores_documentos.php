<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectoConsultoresDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecto_consultores_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consultor_in_projecto_id')->unsigned();      
            $table->integer('consultor_documento_id')->unsigned();
            $table->date('data_entrega');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('consultor_in_projecto_id')
                  ->references('id')
                  ->on('projecto_consultores');
            $table->foreign('consultor_documento_id')
                  ->references('id')
                  ->on('consultores_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projecto_consultores_documentos');
    }
}
