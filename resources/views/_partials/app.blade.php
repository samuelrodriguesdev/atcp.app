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
 <link href="{{ asset("compiled/css/app.css") }}" rel="stylesheet" type="text/css"/>
 <!-- Font Awesome -->
 <link href="{{ asset("theme/plugins/font-awesome-4.5.0/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css"/>
 
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

   <script src="{{ asset("compiled/js/app.js") }}"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>

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