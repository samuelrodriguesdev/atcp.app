<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicosContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tecnicos_contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['Telefone', 'Telemóvel', 'Fax', 'Outro', 'Email']);
            $table->string('value');
            $table->integer('tecnico_id')->unsigned();            
            $table->timestamps();
            $table->foreign('tecnico_id')
                  ->references('id')
                  ->on('tecnicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tecnicos_contatos');
    }
}
