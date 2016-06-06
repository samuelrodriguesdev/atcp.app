@extends('tecnicos.tecnicos')
@section('content2')
<style type="text/css">
   table#tecnicos-table tbody tr:hover td{
      cursor:pointer;
   }
</style>
<div class="col-md-8 col-lg-9">
   <div class="box box-success ">
      <div class="box-header">
         <h3 class="box-title">Técnicos</h3>
         <div class="box-tools pull-right">
            <div class="has-feedback">
               <input type="text" class="form-control input-sm" placeholder="Pesquisar">
               <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
         </div>
      </div>
      <div class="box-body table-responsive">
         <table class="table table-bordered table-hover"  style="width:100%" id="tecnicos-table">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Organismo/Entidade - Técnico</th>
                  <th>Created At</th>
                  <th></th>
               </tr>
            </thead>
         </table>
      </div>
      <div class="overlay" style="visibility: visible;"><i class="fa fa-spinner fa-spin"></i></div>
   </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset("js/tecnicos/gestao_tecnicos.js") }}"></script>
@endsection