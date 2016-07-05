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
         </div>
      </div>
      <div class="box-body table-responsive">
         <table class="table table-bordered table-hover"  style="width:100%" id="tecnicos-table">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Instituição - Técnico</th>
                  <th>Estado Colaboração</th>
                  <th></th>
               </tr>
            </thead>
         </table>
      </div>
      <div class="overlay" style="visibility: visible;"><i class="fa fa-spinner fa-spin"></i></div>
   </div>
</div>
@include('_partials.confirmationDialog')
@endsection
@section('javascript')
<script src="{{ asset("js/tecnicos/gestao_tecnicos.js") }}"></script>
@endsection