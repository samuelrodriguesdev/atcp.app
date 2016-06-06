<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Consultores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('morada');
            $table->string('cp4');
            $table->string('cp3');
            $table->string('localidade');
            $table->string('cc');
            $table->date('cc_validade');
            $table->string('nif');
            $table->string('nib');
            $table->enum('hab_literarias', ['Bacharelato', 'Licenciatura', 'Mestrado', 'Doutoramento', 'Pós-Doutoramento']);
            $table->integer('regime_iva');
            $table->enum('retencao_na_fonte', ['0', '11.5', '16.5', '20', '25']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultores');
    }
}
