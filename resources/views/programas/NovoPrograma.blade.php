@extends('promotores.promotores')
@section('promotores-content')
<div class="col-md-8 col-lg-9">
    <div class="box box-success" >
        <div class="box-header with-border">
            <h3 class="box-title">Novo Programa </h3>
        </div>    
        <form method="POST" action="{{ URL('programas/store') }}" accept-charset="UTF-8" id="programa-form">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <label for="designacao">Designação do Programa</label>
                    <input class="form-control" name="designacao" type="text" id="designacao"  required="required"/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="form-group has-feedback col-md-12 col-lg-6">
                        <label for="ias_valor_1">Apoio á Criação</label>
                        <div class="input-group">
                            <span class="input-group-addon remove">
                                <input name="apoio_criacao" value="1" type="checkbox" aria-label="...">
                            </span>
                            <input type="text" class="form-control" pattern="[-+]?[1-9]*[.,]?[1-9]+" id="ias_valor_1" disabled>
                            <div class="input-group-addon">Total</div>
                            <input type="text" class="form-control" name="apoio_criacao_valor_maximo" id="valor_maximo_elegivel_1" readonly>
                        </div>
                    </div>
                    <div class="form-group has-feedback col-md-12 col-lg-6">
                        <label for="valor_maximo_elegivel_2">Apoio á Consolidação</label>
                        <div class="input-group">
                            <span class="input-group-addon remove">
                                <input name="apoio_consolidacao" pattern="[-+]?[1-9]*[.,]?[1-9]+" value="1" type="checkbox" aria-label="...">
                            </span>
                            <input type="text" class="form-control" pattern="[1-9][0-9]{0,4}" id="ias_valor_2" disabled>
                            <div class="input-group-addon">Total</div>
                            <input type="text" class="form-control" name="apoio_consolidacao_valor_maximo" id="valor_maximo_elegivel_2" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="additional_apoio_tec_1">
                        <div class="form-group has-feedback" id="div_apoio_tec_1">
                            <label for="apoio_tec_1">Documentos para Apoio á Criação</label>
                            <div class="input-group">
                                <span class="input-group-addon remove">
                                    <input type="checkbox" aria-label="...">
                                </span>
                                <input type="hidden" class="form-control" value="1" name="apoio_tec_1[0][apoio_tipo]" disabled>
                                <input class="form-control" name="apoio_tec_1[0][designacao]" type="text" id="apoio_tec_1_input" required="required" disabled>
                                <span class="input-group-btn">
                                    <button class="btn btn-flat bg-green add_field" id="apoio_tec_1" type="button" disabled><i class="fa fa-plus"></i></button>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6" id="additional_apoio_tec_2">
                        <div class="form-group has-feedback" id="div_apoio_tec_2">
                            <label for="apoio_tec_2">Documentos para Apoio á Consolidação</label>
                            <div class="input-group">
                                <span class="input-group-addon remove">
                                    <input type="checkbox" aria-label="...">
                                </span>
                                <input class="form-control" name="apoio_tec_2[0][designacao]" type="text" id="apoio_tec_2_input" required="required" disabled>
                                <input type="hidden" name="apoio_tec_2[0][apoio_tipo]" class="form-control" value="2" disabled>
                                <span class="input-group-btn">
                                    <button class="btn btn-flat bg-green add_field" id="apoio_tec_2" type="button" disabled><i class="fa fa-plus"></i></button>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <small>* Campos Obrigatórios</small>
                <input class="btn bg-green btn-flat pull-right" type="submit" value="Registar" />
            </div>
        </form> 
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    var ias = "{{ DB::table('app_vars')->where('name', 'IAS')->value('value') }}";
</script>
<script src="{{ asset("js/programas/novo_programa.js") }}"></script>
@endsection
