<header class="main-header">
   <!-- Logo -->
   <a href="{{ url("/") }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J | I</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>JADRC | </b>Iniciativa </span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
         <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">1</span>
               </a>
               <ul class="dropdown-menu">
                  <li class="header">Tem 1 nova notificação</li>
                  <li>
                     <!-- inner menu: contains the actual data -->
                     <ul class="menu">
                        <li>
                           <a href="#">
                              <i class="fa fa-users text-aqua"></i> Bem vindo ao Gestor de Projectos
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="footer"><a href="#">Ver todos</a></li>
               </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset("theme/dist/img/default-50x50.gif") }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->nome }}</span>
               </a>
               <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     <img src="{{ asset("theme/dist/img/default-50x50.gif") }}" class="img-circle" alt="User Image">

                     <p>
                        {{ Auth::user()->nome }} <br> {{ Auth::user()->role_user[0]->display_name }}
                     </p>
                  </li>
                  <li class="user-footer">
                     <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat perfil">Perfil</a>
                     </div>
                     <div class="pull-right">
                        <a href="{{ url('logout') }}" class="btn btn-default btn-flat logout">Terminar Sessão</a>
                     </div>
                  </li>
               </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            @role('super_admin') 
            <li>
               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
            @endrole
         </ul>
      </div>
   </nav>
</header>