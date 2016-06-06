<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Programas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao');
            $table->smallInteger('apoio_criacao')->nullable()->default(0);
            $table->smallInteger('apoio_consolidacao')->nullable()->default(0);
            $table->double('apoio_consolidacao_valor_maximo')->nullable()->default(0);;
            $table->double('apoio_criacao_valor_maximo')->nullable()->default(0);;
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
        Schema::drop('programas');
    }
}
