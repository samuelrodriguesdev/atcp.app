@extends('_partials.app')
@section('content')
<section class="content-header">
    <h1>
        Dashboard {{ Request::segment(1) }}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url("/") }}"><i class="fa fa-dashboard"></i> Gestor Projectos</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ DB::table('tecnicos')->count('id') }}</h3>
                    <p>Técnicos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="{{ url('Tecnicos/Gestao-de-Tecnicos') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ DB::table('organismos_entidades')->count('id') }}</h3>
                    <p>Organismos/Entidades</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-contacts"></i>
                </div>
                <a href="{{ url('Tecnicos/Gestao-de-Organismos-Entidades') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ DB::table('consultores')->count('id') }}</h3>
                    <p>Consultores</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="{{ url('Consultores/Gestao-de-Consultores') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ DB::table('promotores')->count('id') }}</h3>
                    <p>Promotores</p>
                </div>
                <div class="icon">
                    <i class="ion ion-filing"></i>
                </div>
                <a href="{{ url('Promotores/Gestao-de-Promotores') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="has-feedback col-md-3 pull-right">
                        <select id="grafico1_input1" class="form-control" style="width:100%;">
                        </select>
                    </div> 
                    <div class="has-feedback col-md-5 pull-right">
                        <select id="grafico1_input2" class="form-control" style="width:100%;">
                        </select>
                    </div> 
                </div>
                <div class="box-body">
                    <canvas id="bar" style="height:250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="has-feedback col-md-3 pull-right">
                        <select id="grafico2_input1" class="form-control" style="width:100%;">
                        </select>
                    </div> 
                    <div class="has-feedback col-md-5 pull-right">
                        <select id="grafico2_input2" class="form-control" style="width:100%;">
                        </select>
                    </div> 
                </div>
                <div class="box-body">
                    <canvas id="doughnut" style="height:150px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="has-feedback col-md-3 pull-right">
                        <select id="grafico3_input3" class="form-control" data-placeholder="Ano"style="width:100%;">
                        </select>
                    </div> 
                    <div class="has-feedback col-md-3 pull-right">
                        <select id="grafico3_input2" class="form-control" data-placeholder="Centro de Emprego" style="width:100%;">
                        </select>
                    </div> 
                    <div class="has-feedback col-md-3 pull-right" id="apoio_tipo" style="display:none;">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="chk_search" value="1" id="consultoria">
                                Consultoria
                            </label>
                            <label>
                                <input type="checkbox" class="chk_search" value="1" id="formacao">
                                Formação
                            </label>
                        </div>
                    </div>
                    <div class="has-feedback col-md-3 pull-right">
                        <select id="grafico3_input1" class="form-control" data-placeholder="Tipo de Apoio" style="width:100%;">
                            <option></option>
                            <option value="1">Apoio á Criação</option>
                            <option value="2">Apoio á Consolidação</option>
                        </select>
                    </div> 
                </div>
                <div class="box-body">
                    <canvas id="grafico3" style="height:150px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="has-feedback col-md-3 pull-right">
                        <select id="grafico4_input1" class="form-control" style="width:100%;">
                        </select>
                    </div> 
                    <div class="has-feedback col-md-5 pull-right">
                        <select id="grafico4_input2" class="form-control" style="width:100%;">
                        </select>
                    </div> 
                </div>
                <div class="box-body">
                    <canvas id="grafico4" style="height:150px;"></canvas>
                    
                </div>
                <div class="box-footer">
                    <div id="chartjs-tooltip"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('javascript')
<script src="{{ asset ("theme/plugins/chartjs/Chart.bundle.min.js") }}"></script>
<script src="{{ asset ("js/estatistica/estatistica.js") }}"></script>
@endsection