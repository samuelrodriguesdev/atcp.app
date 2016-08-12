<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('organismo_entidade_id')->unsigned(); 
            $table->integer('certificacao');   
            $table->integer('estado_colaboracao');   
            $table->text('funcoes_desempenhadas');   
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('organismo_entidade_id')
                  ->references('id')
                  ->on('organismos_entidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tecnicos');
    }
}
