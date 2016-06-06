<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConsultoresContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultores_contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['Telefone', 'Telemóvel', 'Fax', 'Outro', 'Email']);
            $table->string('value');
            $table->integer('consultor_id')->unsigned();            
            $table->timestamps();
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
        Schema::drop('consultores_contatos');
    }
}
