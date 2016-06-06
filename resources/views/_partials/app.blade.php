<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"/>
 <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
 <meta name="_token" content="{!! csrf_token() !!}"/>
 <title>{{ $page_title or "JADRC | Iniciativa" }}</title>
 
 <!-- Tell the browser to be responsive to screen width -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
 <!-- Bootstrap 3.3.5 -->
 <link href="{{ asset("theme/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
 <!-- Font Awesome -->
 <link href="{{ asset("theme/plugins/font-awesome-4.5.0/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css"/>
 <!-- Ionicons -->
 <link href="{{ asset("theme/plugins/ionicons-2.0.1/css/ionicons.min.css") }}" rel="stylesheet" type="text/css"/>
 <!-- Select2 4.0.2 -->
 <link href="{{ asset("theme/plugins/select2/select2.min.css") }}" rel="stylesheet" type="text/css"/>
 <!-- iCheck -->
 <link href="{{ asset("theme/plugins/iCheck/flat/green.css") }}" rel="stylesheet" type="text/css"/>
 <!-- Date Picker -->
 <link href="{{ asset("theme/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css"/>
  <!-- DataTables -->
 <link href="{{ asset("theme/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" type="text/css"/>
  <!-- Theme style -->
 <link href="{{ asset("theme/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css"/>
 <!-- AdminLTE Skin -->
 <link href="{{ asset("theme/dist/css/skins/skin-green.min.css") }}" rel="stylesheet" type="text/css"/>
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-green sidebar-mini">
   <div class="wrapper">
     
      <!-- Top Bar -->
      @include('_partials._topBar')
      <!-- Left Bar -->
      @include('_partials._leftBar')

      <!-- Content Wrapper. Contains Page Content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- ./content-wrapper -->

      <!-- Right Bar AKA AdminBar -->  
      @include('_partials._rightBar')

   </div>
   <!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="{{ asset ("theme/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset ("theme/plugins/jQueryUI/jquery-ui.min.js") }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{ asset("theme/bootstrap/js/bootstrap.min.js") }}"></script>
   <!-- Select2 4.0.2 -->
  <script src="{{ asset("theme/plugins/select2/select2.full.min.js") }}"></script>
  <!-- datepicker -->
  <script src="{{ asset("theme/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
  <!-- datepicker language-->
  <script src="{{ asset("theme/plugins/datepicker/locales/bootstrap-datepicker.pt.js") }}"></script>
  <!-- Slimscroll -->
  <script src="{{ asset("theme/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
  <!-- FastClick -->
  <script src="{{ asset("theme/plugins/fastclick/fastclick.js") }}"></script>
  <!-- Bootstrap Validator -->
  <script src="{{ asset("theme/plugins/bootstrap-validator/validator.min.js") }}"></script>
  <!-- iCheck -->
  <script src="{{ asset("theme/plugins/iCheck/icheck.min.js") }}"></script>
  <!-- dataTables -->
  <script src="{{ asset("theme/plugins/datatables/jquery.dataTables.js") }}"></script>
  <script src="{{ asset("theme/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("theme/dist/js/app.min.js") }}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  });
  var config = {
    'url'   : '{{ url('') }}',
    'asset' : '{{ asset('') }}'
  };
  </script>
  <!-- Scripts Section -->
  @yield('javascript')
  <!-- /Scripts Section -->
 </body>
 </html>