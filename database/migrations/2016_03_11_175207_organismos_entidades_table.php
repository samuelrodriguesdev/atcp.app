<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrganismosEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organismos_entidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('morada');
            $table->string('cp4');
            $table->string('cp3');
            $table->integer('distrito_id')->unsigned();
            $table->string('localidade');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('distrito_id')
                  ->references('id')
                  ->on('distritos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organismos_entidades');
    }
}
