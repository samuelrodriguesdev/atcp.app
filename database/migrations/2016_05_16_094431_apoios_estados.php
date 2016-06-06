<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApoiosEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoios_estados', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('apoio_tipo');
            $table->string('designacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apoios_estados');
    }
}
