@extends('consultores.consultores')
@section('consultores-content')
<style type="text/css">
   table#consultores-table tbody tr:hover td{
      cursor:pointer;
   }
</style>
<div class="col-md-8 col-lg-9">
   <div class="box box-success ">
      <div class="box-header with-border">
         <h3 class="box-title">Consultores</h3>
         <div class="box-tools pull-right">
            <div class="has-feedback">
            </div>
         </div>
      </div>
      <div class="box-body ">
         <table class="table table-bordered table-hover"  width="100%" id="consultores-table">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Nif</th>
                  <th>Created At</th>
               </tr>
            </thead>
         </table>
      </div>
      <div class="overlay" style="visibility: visible;"><i class="fa fa-spinner fa-spin"></i></div>
   </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset("js/consultores/gestao_consultores.js") }}"></script>
@endsection
