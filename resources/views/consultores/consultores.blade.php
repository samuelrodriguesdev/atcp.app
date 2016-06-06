@extends('_partials.app')
@section('content')
<section class="content-header">
    <h1>
        Gestão de Consultores
        <small id="sub-title"></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url("/") }}"><i class="fa fa-dashboard"></i> Gestor de Projectos</a></li>
        <li class="active">Gestão de Consultores</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <a href="{{ URL::to('Consultores/Novo-Consultor') }}" class="btn btn-flat bg-green btn-block margin-bottom sub_link">Novo Consultor</a>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked nav-active">
                        <li>
                            <a href="{{ URL::to('Consultores/Gestao-de-Consultores') }}" >
                                <i class="fa fa-users"></i> 
                                Consultores
                            </a>
                        </li>
                         <li>
                            <a href="{{ URL::to('Consultores/Gestao-de-Contratos') }}" >
                                <i class="fa fa-folder"></i> 
                                Contratos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-7">
            @include('vendor.flash.message')
        </div>
        @yield('consultores-content')
    </div>
</section>
@endsection
