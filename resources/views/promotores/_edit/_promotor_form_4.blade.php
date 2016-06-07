
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
                <a data-toggle="modal" href="{{ url('projecto/novo_pedido_pagamento/'.$promotor->projecto->id) }}" data-target="#myModal" class="btn btn-block bg-green btn-flat btn-sm">Adicionar P.P</a>
            </div>
        </div>
    </div>
    <div class="box-body">
     <div class="box-group" id="accordion">
        @foreach ($promotor->projecto->pedidos_pagamento as $pp)
        <div class="panel box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $pp->id }}" aria-expanded="false" class="collapsed">
                        {{ $pp->pedido_pagamento_data }}
                    </a>
                </h4>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-flat btn-primary btn-xs">
                        <i class="fa fa-info-circle">
                        </i>
                    </button>
                </div>   
            </div>
            <div id="collapse{{ $pp->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                 
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
