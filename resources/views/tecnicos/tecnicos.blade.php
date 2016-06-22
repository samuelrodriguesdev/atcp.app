@extends('_partials.app')
@section('content')
<section class="content-header">
   <h1>
      Gestão de Técnicos
      <small id="sub-title"></small>
   </h1>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-4 col-lg-3">
         <a href="{{ URL::to('Tecnicos/Novo-Tecnico') }}" class="btn btn-flat bg-green btn-block margin-bottom">Novo Técnico</a>
         <a href="{{ URL::to('Tecnicos/Nova-Instituicao') }}" class="btn btn-flat bg-green btn-block margin-bottom">Nova Instituição</a>
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">Folders</h3>
            </div>
            <div class="box-body no-padding">
               <ul class="nav nav-pills nav-stacked nav-active">
                  <li class="{{ Request::segment(2) == "Gestao-de-Tecnicos" ? 'active' : ''  }}">
                     <a href="{{ URL::to('/Tecnicos/Gestao-de-Tecnicos') }}">
                        <i class="fa fa-users"></i> 
                        Técnicos
                     </a>
                  </li>
                  <li class="{{ Request::segment(2) == "Gestao-de-Instituicoes" ? 'active' : ''  }}">
                     <a href="{{ URL::to('/Tecnicos/Gestao-de-Instituicoes') }}">
                        <i class="fa fa-university"></i> 
                        Instituições
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="col-md-8 col-lg-7">
         @include('vendor.flash.message')
      </div>
      @yield('content2')
   </div>
</section>
@endsection
