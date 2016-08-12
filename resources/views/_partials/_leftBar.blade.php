<aside class="main-sidebar">
   <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left image">
            <img src="{{ asset("theme/dist/img/default-50x50.gif") }}" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p>{{ Auth::user()->nome }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
         <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Procurar...">
            <span class="input-group-btn">
               <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
               </button>
            </span>
         </div>
      </form>
      <ul class="sidebar-menu">
         <li class="header">MAIN NAVIGATION </li>
         <li class="{{ Request::segment(1) == "Dashboard"  ? 'active' : ''  }}">
            <a href="{{ url("/Dashboard") }}">
               <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
         </li>
         <li class="{{ Request::segment(1) == "Tecnicos" ? 'active' : ''  }}">
            <a href="{{ url("/Tecnicos/Gestao-de-Tecnicos") }}">
               <i class="fa fa-users"></i> <span>Técnicos</span>
            </a>
         </li>
         <li class="{{ Request::segment(1) == "Consultores" ? 'active' : ''  }}">
            <a href="{{ url("/Consultores/Gestao-de-Consultores") }}">
               <i class="fa fa-users"></i> <span>Consultores</span>
            </a>
         </li>
         <li class="{{ in_array(Request::segment(1), ["Programas", "Promotores"] ) ? 'active' : ''  }}">
            <a href="{{ url("/Promotores/Gestao-de-Promotores") }}">
               <i class="fa fa-users"></i> <span>Promotores</span>
            </a>
         </li>
         <li class="{{ Request::segment(1) == "Outputs" ? 'active' : ''  }}">
            <a href="{{ url("/Outputs/") }}">
               <i class="fa fa-users"></i> <span>Outputs</span>
            </a>
         </li>
      </ul>
   </section>
</aside>