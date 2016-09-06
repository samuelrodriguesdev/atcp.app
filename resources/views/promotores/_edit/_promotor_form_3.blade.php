<style type="text/css" media="screen">
    #documentos td:not(:first-child){
        min-width:160px;
        text-align: center;   
    }  
</style>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">&nbsp;</h3>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <a data-toggle="modal" href="{{ url('projecto/novo_consultor/'.$promotor->projecto->id) }}" data-target="#myModal" class="btn btn-block bg-green btn-flat btn-sm">Adicionar Consultor</a>
            </div>
        </div>
    </div>
    <div class="box-body">
     <div class="box-group" id="accordion">
        @foreach ($promotor->projecto->contratos as $contrato)
        <div class="panel box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $contrato->id }}" aria-expanded="false" class="collapsed">
                        {{ $contrato->consultor->nome }}
                    </a>
                </h4>
                 <div class="btn-group pull-right">
                        <a data-toggle="modal" href="{{ url('projecto/projecto_consultor_detalhes/'.$contrato->id) }}" data-target="#detalhesContrato" class="btn btn-flat bg-primary btn-sm">
                            <i class="fa fa-pencil">
                            </i>
                        </a> 
                        <a data-href="{{ url('projecto/delete-consultor/'.$contrato->id) }}" class="btn btn-flat btn-danger btn-sm delete-consultor">
                            <i class="fa fa-trash">
                            </i>
                        </a>
                </div>  
            </div>
            <div id="collapse{{ $contrato->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                 <div class="table-responsive">
                    <table class="table table-striped" id="documentos">
                        <thead>
                            <tr>
                                <th class="text-center">Documentos</th>
                                <th class="text-center">#1</th>
                                <th class="text-center">#2</th>
                                <th class="text-center">#3</th>
                                <th class="text-center">#4</th>
                                <th class="text-center">#5</th>
                                <th class="text-center">#6</th>
                                <th class="text-center">#7</th>
                                <th class="text-center">#8</th>
                                <th class="text-center">#9</th>
                                <th class="text-center">#10</th>
                                <th class="text-center">#11</th>
                                <th class="text-center">#12</th>
                                <th class="text-center">#13</th>
                                <th class="text-center">#14</th>
                                <th class="text-center">#15</th>
                                <th class="text-center">#16</th>
                                <th class="text-center">#17</th>
                                <th class="text-center">#18</th>
                                <th class="text-center">#19</th>
                                <th class="text-center">#20</th>
                                <th class="text-center">#21</th>
                                <th class="text-center">#22</th>
                                <th class="text-center">#23</th>
                                <th class="text-center">#24</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\ConsultorDocumentos::all() as $documento)
                            <tr>
                                <td>{{ $documento->designacao }}</td>
                                @for ($i = 0; $i < 24; $i++)
                                <td><input type="text" name="" class="form-control input-sm date"></td>
                                @endfor
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
<div id="myModal" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>
<div id="detalhesContrato" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>
