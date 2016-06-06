<style type="text/css">
   table#consultores-table tbody tr:hover td{
      cursor:pointer;
   }
</style>
<div class="col-md-8 col-lg-9">
   <div class="box box-success ">
      <div class="box-header with-border">
         <h3 class="box-title">Contratos</h3>
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
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
</div>
<script type="text/javascript">
   var organimosEntidadesTable = $('#consultores-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! URL('organismos_entidades/list') !!}',
      "sDom": '<"top">rt<"bottom"ip><"clear">',
   });

</script>
