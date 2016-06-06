<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrganismoEntidadesContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organismo_entidades_contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['Telefone', 'Telemóvel', 'Fax', 'Outro', 'Email']);
            $table->string('value');
            $table->integer('organismo_entidade_id')->unsigned();            
            $table->timestamps();
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
        Schema::drop('organismo_entidades_contatos');
    }
}
