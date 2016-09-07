<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectoConsultores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecto_consultores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projecto_id')->unsigned();      
            $table->integer('consultor_id')->unsigned();  
            $table->smallInteger('contrato_tipo');   
            $table->date('data_inicio_servico');
            $table->date('data_fim_servico');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('projecto_id')
                  ->references('id')
                  ->on('projectos');
            $table->foreign('consultor_id')
                  ->references('id')
                  ->on('consultores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projecto_consultores');
    }
}
