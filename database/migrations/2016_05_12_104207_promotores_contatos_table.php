<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PromotoresContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotores_contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['Telefone', 'Telemóvel', 'Fax', 'Outro', 'Email']);
            $table->string('value');
            $table->integer('promotor_id')->unsigned();            
            $table->timestamps();
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
        Schema::drop('promotores_contatos');
    }
}
