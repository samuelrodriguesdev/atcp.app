@extends('_partials.app')
@section('content')
<section class="content-header">
    <h1>
    Gestão de Promotores
    <small id="sub-title"></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url("/") }}"><i class="fa fa-dashboard"></i> Gestor de Projectos</a></li>
        <li class="active">Gestão de Promotores</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <a href="{{ URL::to('Promotores/Novo-Promotor') }}" class="btn btn-flat bg-green btn-block margin-bottom sub_link">Novo Promotor</a>
            <div class="box box-success">
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked nav-active">
                        <li class="{{ Request::segment(2) == "Gestao-de-Promotores" ? 'active' : ''  }}" >
                            <a href="{{ URL::to('Promotores/Gestao-de-Promotores') }}" >
                                <i class="fa fa-building"></i>
                                Promotores
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked nav-active">
                        <li class="{{ Request::segment(2) == "Novo-Programa" ? 'active' : ''  }}">
                            <a href="{{ URL::to('Programas/Novo-Programa') }}" >
                                <i class="fa fa-file-text"></i>
                                Novo Programa
                            </a>
                        </li>
                        <li class="{{ Request::segment(2) == "Gestao-de-Programas" ? 'active' : ''  }}">
                            <a href="{{ URL::to('Programas/Gestao-de-Programas') }}" >
                                <i class="fa fa-folder-open"></i>
                                Gestão de Programas
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            @include('vendor.flash.message')
        </div>
        @yield('promotores-content')
    </div>
</section>
@endsection