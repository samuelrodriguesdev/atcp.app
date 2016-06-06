<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inciar Sessão</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link href="{{ asset("theme/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
  <!-- Font Awesome -->
  <link href="{{ asset("theme/plugins/font-awesome-4.5.0/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css"/>
  <!-- Ionicons -->
  <link href="{{ asset("theme/plugins/ionicons-2.0.1/css/ionicons.min.css") }}" rel="stylesheet" type="text/css"/>
  <!-- Theme style -->
  <link href="{{ asset("theme/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css"/>
  <!-- iCheck -->
  <link href="{{ asset("theme/plugins/iCheck/flat/green.css") }}" rel="stylesheet" type="text/css"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url("/") }}"><b>JADRC | </b>Iniciativa</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Faça Login com a sua conta</p>
      <form action="{{ URL('login') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" >
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember"> Lembrar
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery 2.2.0 -->
  <script src="{{ asset ("theme/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ asset("theme/bootstrap/js/bootstrap.min.js") }}"></script>
  <!-- iCheck -->
  <script src="{{ asset("theme/plugins/iCheck/icheck.min.js") }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      increaseArea: '40%' 
    });
  });
</script>
</body>
</html>
