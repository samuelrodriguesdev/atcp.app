<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectoConsultoresDetalhes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecto_consultores_detalhes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projecto_consultor_id')->unsigned();      
            $table->smallInteger('tipo');
            $table->double('valor_hora');
            $table->smallInteger('numero_horas')->nullable();
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('projecto_consultor_id')
                  ->references('id')
                  ->on('projecto_consultores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projecto_consultores_detalhes');
    }
}
