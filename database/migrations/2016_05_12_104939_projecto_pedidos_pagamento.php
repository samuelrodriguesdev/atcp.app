<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectoPedidosPagamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecto_pedidos_pagamento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projecto_id')->unsigned();    
            $table->double('valor_pedido_pagamento');
            $table->double('valor_pago_pagamento');
            $table->date('data_pedido_pagamento');
            $table->date('data_recebimento_pagamento');
            $table->smallInteger('estado_pedido_pagamento');
            $table->text('observacoes');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('projecto_id')
                  ->references('id')
                  ->on('projectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projecto_pedidos_pagamento');
    }
}
