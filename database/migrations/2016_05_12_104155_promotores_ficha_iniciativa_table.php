<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PromotoresFichaIniciativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotores_ficha_iniciativa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promotor_id')->unsigned();
            $table->tinyInteger('situacao_profissional');
            $table->tinyInteger('tipo_desemprego');
            $table->date('situacao_profissional_data');
            $table->tinyInteger('centro_emprego_inscricao');
            $table->date('centro_emprego_inscricao_data');
            $table->tinyInteger('subsidio_desemprego');
            $table->smallInteger('subsidio_desemprego_valor');
            $table->smallInteger('subsidio_desemprego_data');
            $table->text('funcoes_desempenhadas');
            $table->tinyInteger('negocio_proprio');
            $table->tinyInteger('intencao_negocio_proprio');
            $table->tinyInteger('fundador');
            $table->tinyInteger('apoio_externo');
            $table->tinyInteger('estado_negocio');
            $table->text('area_intervencao');
            $table->text('pontos_fortes');
            $table->text('objectivos');
            $table->text('tipo_bem_servico');
            $table->text('caracterizacao_mercado');
            $table->text('caracterizacao_instalacoes');
            $table->text('recursos_materiais');
            $table->text('recursos_tecnologicos');
            $table->text('recursos_humanos');
            $table->text('recursos_financeiros');
            $table->double('elaboracao_candidatura');
            $table->double('capital_proprio');
            $table->double('micro_invest');
            $table->double('antecipacao_subsidio');
            $table->text('caracteristicas_promotor');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('promotor_id')
                  ->references('id')
                  ->on('promotores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('promotores_ficha_iniciativa');
    }
}
