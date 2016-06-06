@extends('tecnicos.tecnicos')
@section('content2')
<style type="text/css">
   table#organismosEntidades-table tbody tr:hover td{
      cursor:pointer;
   }
</style>
<div class="col-md-8 col-lg-9">
   <div class="box box-success ">
      <div class="box-header with-border">
         <h3 class="box-title">Organismos/Entidades</h3>
         <div class="box-tools pull-right">
            <div class="has-feedback">

            </div>
         </div>
      </div>
      <div class="box-body ">
         <table class="table table-bordered table-hover"  width="100%" id="organismosEntidades-table">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
               </tr>
            </thead>
         </table>
      </div>
      <div class="overlay" style="visibility: visible;"><i class="fa fa-spinner fa-spin"></i></div>
   </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset("js/organismos_entidades/gestao_organismos_entidades.js") }}"></script>
@endsection

