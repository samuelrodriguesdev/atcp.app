<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectosTecnicos extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecto_tecnicos', function (Blueprint $table) {
            
            $table->integer('projecto_id')->unsigned();      
            $table->integer('tecnico_id')->unsigned();    
            $table->foreign('projecto_id')
                  ->references('id')
                  ->on('projectos');
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
        Schema::drop('projecto_tecnicos');
    }
}
