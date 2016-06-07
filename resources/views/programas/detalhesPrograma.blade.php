@extends('promotores.promotores')
@section('promotores-content')
<div class="col-md-9 col-lg-9">
    <div class="box box-success" >
        <div class="box-header with-border">
            <h3 class="box-title">Detalhes Programa </h3>
        </div>
        <form method="POST" action="{{ URL('programas/update/'.$programa->id) }}" accept-charset="UTF-8" id="programa-form" data-toggle="validator">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <label for="designacao">Designação do Programa</label>
                    <input class="form-control" name="designacao" type="text" id="designacao"  value="{{ $programa->designacao }}" required="required"/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="form-group has-feedback col-md-6">
                        <label for="ias_valor_1">Apoio á Criação</label>
                        <div class="input-group">
                            <span class="input-group-addon remove">
                                <input name="apoio_criacao_chk" value="1" type="checkbox" aria-label="..." {{ $programa->apoio_criacao==1 ? 'checked' : '' }} >
                                <input type="hidden" name="apoio_criacao" class="form-control" value="{{ $programa->apoio_criacao }}">
                            </span>
                            <input type="text" class="form-control" id="ias_valor_1" pattern="[-+]?[1-9]*[.,]?[1-9]+" value="{{ round($programa->apoio_criacao_valor_maximo /  App\Vars::find(1)->value, 1) }}" >
                            <div class="input-group-addon">Total</div>
                            <input type="text" class="form-control" name="apoio_criacao_valor_maximo" id="valor_maximo_elegivel_1" value="{{ $programa->apoio_criacao_valor_maximo }}" readonly>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label for="valor_maximo_elegivel_2">Apoio á Consolidação</label>
                        <div class="input-group">
                            <span class="input-group-addon remove">
                                <input name="apoio_consolidacao_chk" value="1" type="checkbox" aria-label="..." {{ $programa->apoio_consolidacao==1 ? 'checked' : '' }}>
                                <input type="hidden" name="apoio_consolidacao" class="form-control" value="{{ $programa->apoio_consolidacao }}">
                            </span>
                            <input type="text" class="form-control" pattern="[-+]?[1-9]*[.,]?[1-9]+" id="ias_valor_2" value="{{ round($programa->apoio_consolidacao_valor_maximo /  App\Vars::find(1)->value, 1) }}">
                            <div class="input-group-addon">Total</div>
                            <input type="text" class="form-control" name="apoio_consolidacao_valor_maximo" id="valor_maximo_elegivel_2" value="{{ $programa->apoio_consolidacao_valor_maximo }}" readonly>
                        </div>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="additional_apoio_tec_1">
                        <div class="form-group has-feedback" id="div_apoio_tec_1">
                            <label for="apoio_tec_1">Documentos para Apoio á Criação</label>
                            <div class="input-group">
                                <span class="input-group-addon remove">
                                    <input id="apoio_tipo_1" type="checkbox" aria-label="..." {{ $programa->documentos()->where('apoio_tipo', 1)->count() !=0 ? 'checked' : '' }}>
                                </span>
                                <input type="hidden" class="form-control" value="1" name="apoio_tec_1[0][apoio_tipo]" disabled>
                                <input class="form-control" name="apoio_tec_1[0][designacao]" type="text" id="apoio_tec_1_input" disabled>
                                <span class="input-group-btn">
                                    <button class="btn btn-flat bg-green add_field" id="apoio_tec_1" type="button" disabled><i class="fa fa-plus"></i></button>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        @foreach ($programa->documentos()->where('apoio_tipo', 1)->get() as $documento)
                        <div class="form-group has-feedback" id="div_apoio_tec_1">
                            <div class="input-group">
                                <input type="hidden" class="form-control" value="1" name="apoio_tec_1[{{ $documento->id }}][apoio_tipo]">
                                <input class="form-control" value="{{ $documento->designacao }}" name="apoio_tec_1[{{ $documento->id }}][designacao]" type="text" id="apoio_tec_1_input" required="required">
                                <span class="input-group-btn">
                                    <button class="btn btn-flat btn-danger remove_field" id="apoio_tec_1" type="button"><i class="fa fa-minus"></i></button>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-6" id="additional_apoio_tec_2">
                        <div class="form-group has-feedback" id="div_apoio_tec_2">
                            <label for="apoio_tec_2">Documentos para Apoio á Consolidação</label>
                            <div class="input-group">
                                <span class="input-group-addon remove">
                                    <input id="apoio_tipo_2" type="checkbox" aria-label="..." {{ $programa->documentos()->where('apoio_tipo', 2)->count() !=0 ? 'checked' : '' }}>
                                </span>
                                <input class="form-control" name="apoio_tec_2[0][designacao]" type="text" id="apoio_tec_2_input" disabled>
                                <input type="hidden" name="apoio_tec_2[0][apoio_tipo]" class="form-control" value="2" disabled>
                                <span class="input-group-btn">
                                    <button class="btn btn-flat bg-green add_field" id="apoio_tec_2" type="button" disabled><i class="fa fa-plus"></i></button>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        @foreach ($programa->documentos()->where('apoio_tipo', 2)->get() as $documento)
                        <div class="form-group has-feedback" id="div_apoio_tec_2">
                            <div class="input-group">
                                <input class="form-control" name="apoio_tec_2[{{ $documento->id }}][designacao]" type="text" id="apoio_tec_2_input" value="{{ $documento->designacao }}" required="required" >
                                <input type="hidden" name="apoio_tec_2[{{ $documento->id }}][apoio_tipo]" class="form-control" value="2" >
                                <span class="input-group-btn">
                                    <button class="btn btn-flat btn-danger remove_field" id="apoio_tec_2" type=""><i class="fa fa-minus"></i></button>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <small>* Campos Obrigatórios</small>
                <input class="btn bg-green btn-flat pull-right" type="submit" value="Guardar" />
            </div>
        </form> 
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    var ias = "{{ App\Vars::find(1)->value }}";
    var hasDocumentos_1 = "{{ $programa->documentos()->where('apoio_tipo',1)->count() }}";
    var hasDocumentos_2 = "{{ $programa->documentos()->where('apoio_tipo',2)->count() }}";
</script>
<script src="{{ asset("js/programas/detalhes_programa.js") }}"></script>
@endsection
