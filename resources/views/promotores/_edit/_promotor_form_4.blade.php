<style type="text/css" media="screen">
    #documentos td:not(:first-child){
        min-width:160px;
        text-align: center;   
    }  
</style>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <a data-toggle="modal" href="{{ url('projecto/novo_pedido_pagamento/'.$promotor->projecto->id) }}" data-target="#novoPP" class="btn btn-block bg-green btn-flat btn-sm">Adicionar P.P</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="box-group" id="accordion">
            @foreach ($promotor->projecto->pedidos_pagamento as $pp)
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#pedidoPagamento{{ $pp->id }}" aria-expanded="false" class="collapsed">
                            {{ $pp->data_pedido_pagamento }}
                        </a>
                    </h3>
                    <div class="btn-group pull-right">
                        <a data-toggle="modal" href="{{ url('projecto/pedido_pagamento_detalhes/'.$pp->id) }}" data-target="#detalhesPP" class="btn btn-flat bg-primary btn-sm">
                            <i class="fa fa-pencil">
                            </i>
                        </a> 
                        <a class="btn btn-flat btn-danger btn-sm">
                            <i class="fa fa-trash">
                            </i>
                        </a>
                </div>  
            </div>
            <div id="pedidoPagamento{{ $pp->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                    <div class="row">
                        <div class="form-group has-feedback col-md-6">
                            <label for="data_pedido_pagamento">Data P.P</label>
                            <input type="text" name="data_pedido_pagamento" class="form-control date" value="{{ $pp->data_pedido_pagamento }}" disabled>
                        </div>
                        <div class="form-group has-feedback col-md-6">
                            <label for="data_recebimento_pagamento">Data Recebimento P.P</label>
                            <input type="text" name="data_recebimento_pagamento" class="form-control date" value="{{ $pp->data_recebimento_pagamento }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-md-5">
                            <label for="valor_pedido_pagamento">Valor P.P</label>
                            <input type="text" name="valor_pedido_pagamento" id="valor_pedido_pagamento" class="form-control" value="{{ $pp->valor_pedido_pagamento }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-md-7">
                            <label for="">Estado</label>
                            <select class="form-control" required="required" style="width:100%;" disabled>
                                <option value="1">Não Liquidado</option>
                                <option value="2">Liquidado</option>
                                <option value="3">Liquidado Parcialmente</option>
                            </select>
                        </div>
                        @if($pp->estado_pedido_pagamento==3)
                        <div class="form-group has-feedback col-md-5">
                            <label for="valor_pago_pagamento">Valor Recebido P.P</label>
                            <input type="text" name="valor_pago_pagamento" id="valor_pago_pagamento" class="form-control" value="{{ $pp->valor_pago_pagamento }}" disabled>
                        </div>
                        @endif
                    </div>
                    <label for="observacoes">Observações</label>
                    <textarea name="observacoes" id="observacoes" class="form-control" rows="3" disabled>{{ $pp->observacoes }}</textarea>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
<div id="novoPP" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<div id="detalhesPP" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
