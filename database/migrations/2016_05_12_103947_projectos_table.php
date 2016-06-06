<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promotor_id')->unsigned();
            $table->integer('programa_id')->unsigned();
            $table->smallInteger('apoio_criacao')->unsigned();            
            $table->smallInteger('apoio_criacao_estado');
            $table->smallInteger('apoio_consolidacao')->unsigned();            
            $table->smallInteger('apoio_consolidacao_estado');
            $table->smallInteger('declaracao_atcp');
            $table->date('declaracao_atcp_data');
            $table->smallInteger('contrato_atcp');
            $table->date('contrato_atcp_data');
            $table->date('projecto_data_inicio');
            $table->date('projecto_data_submissao');
            $table->date('projecto_data_aprovacao');
            $table->date('projecto_data_fim');
            $table->string('processo_numero');
            $table->date('inicio_actividade_data');
            $table->smallInteger('numero_meses');
            $table->double('montante_total_elegivel');
            $table->text('projecto_notas');
            $table->timestamps();
            $table->foreign('promotor_id')
                  ->references('id')
                  ->on('promotores');
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
       Schema::drop('projectos');
    }
}
