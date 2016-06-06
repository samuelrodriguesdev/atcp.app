<section class="content-header">
   <h1>
      Dashboard
      <small><?=Request::url()?></small>
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
               <h3>150</h3>
               <p>Técnicos</p>
            </div>
            <div class="icon">
               <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-teal">
            <div class="inner">
               <h3>200</h3>
               <p>Consultores</p>
            </div>
            <div class="icon">
               <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-teal">
            <div class="inner">
               <h3>15</h3>
               <p>Promotores</p>
            </div>
            <div class="icon">
               <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-teal">
            <div class="inner">
               <h3>15</h3>
               <p>Projectos</p>
            </div>
            <div class="icon">
               <i class="ion ion-filing"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
   </div>
   <div class="row">
      estado dos promotores muda para inactivo quando o contracto de apoio tecnico termina
      enviar emails automaticamente para os consultores
      tecnicos/consultores tem limite de 10 projectos activos
   </div>
</section>