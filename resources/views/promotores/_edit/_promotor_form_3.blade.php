<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <a data-toggle="modal" href="{{ url('projecto/novo_consultor/'.$promotor->projecto->id) }}" data-target="#myModal" class="btn btn-block bg-green btn-flat btn-sm">Adicionar Consultor</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        {{ $promotor->projecto->id }}
    </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>