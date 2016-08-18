@extends('_partials.app')
@section('content')
<section class="content-header">
    <h1>
        Outputs 
        <small></small>
    </h1>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Pedidos de Pagamento</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-block bg-olive btn-flat btn-sm" id="export">Exportar</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="form-group has-feedback">
                        <label for="centro_emprego">Centro de Emprego</label>
                        <select id="centro_emprego" name="centro_emprego" class="form-control" data-placeholder="Centro de Emprego" style="width:100%;">
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group has-feedback">
                        <label for="programa">Programa</label>
                        <select id="programa" name="programa" class="form-control" data-placeholder="Programa">
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group has-feedback">
                        <label for="tipo_de_apoio">Tipo de Apoio</label>
                        <select id="tipo_de_apoio" name="tipo_de_apoio" class="form-control" data-placeholder="Tipo de Apoio">
                            <option></option>
                            <option value="1">Apoio á Criação</option>
                            <option value="2">Apoio á Consolidação</option>
                        </select>
                    </div>
                </div>  
                <div class="col-md-4 col-lg-4">
                    <div class="form-group has-feedback">
                        <label for="estado_pedido_pagamento">Estado Pedido de pagamento</label>
                        <select id="estado_pedido_pagamento" name="estado_pedido_pagamento" class="form-control" data-placeholder="Estado Pedido de pagamento">
                            <option></option>
                            <option value="1">Não Liquidado</option>
                            <option value="2">Liquidado</option>
                            <option value="3">Liquidado Parcialmente</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group has-feedback">
                        <label for="ano">Ano</label>
                        <select id="ano" name="ano" class="form-control" data-placeholder="Ano" style="width:100%;">
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="form-group has-feedback">
                        <label for="1trimestre">&nbsp;</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="trimestres[]" id="1trimestre" value="1"> 
                                1º Trimestre
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="form-group has-feedback">
                        <label for="2trimestre">&nbsp;</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="trimestres[]" id="2trimestre" value="2"> 
                                2º Trimestre
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="form-group has-feedback">
                        <label  for="3trimestre">&nbsp;</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="trimestres[]" id="3trimestre" value="3"> 
                                3º Trimestre
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="form-group has-feedback">
                        <label for="4trimestre">&nbsp;</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="trimestres[]" id="4trimestre" value="4"> 
                                4º Trimestre
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Consultores</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-block bg-olive btn-flat btn-sm" id="export_consultores" >Exportar</a>
            </div>
        </div>
        <div class="box-body">
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Promotores</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-block bg-olive btn-flat btn-sm" id="export_promotores">Exportar</a>
            </div>
        </div>
        <div class="box-body">
        </div>
    </div>
</section>
@endsection
@section('javascript')
<script src="{{ asset ("js/outputs/outputs.js") }}"></script>
@endsection