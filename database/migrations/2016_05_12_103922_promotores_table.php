<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PromotoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cc');
            $table->date('cc_validade');
            $table->date('data_nascimento');
            $table->string('nif');
            $table->string('nib');
            $table->string('morada');
            $table->string('cp4');
            $table->string('cp3');
            $table->string('localidade');
            $table->string('hab_literarias');
            $table->smallInteger('promotor_estado');
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
        Schema::drop('promotores');
    }
}
