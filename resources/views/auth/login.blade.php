
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Examen | Inciar Sesi&oacute;n</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/purple.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Omnilife</b>EXAMEN</a>
            </div>

            <div class="login-box-body">
                <p class="login-box-msg">Escribe tu correo y contrase&ntilde;a; e inicia sesi&oacute;n.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group has-feedback @error('email') has-error @enderror">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" autocomplete="email" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        @error('email')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group has-feedback @error('password') has-error @enderror">
                        <input is="password" name="password" type="password" class="form-control" placeholder="Contraseña" autocomplete="current-password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        @error('password')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="checkbox icheck">
                                <label><input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}> Recu&eacute;rdame</label>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <button type="submit" class="btn bg-purple btn-block btn-flat"><i class="fa fa-sign-in"></i> Iniciar Sesi&oacute;n</button>
                        </div>
                    </div>
                </form>

                <br>

                <a href="{{ route('register') }}" class="text-center"><i class="fa fa-user-plus"></i> Registar Nuevo Usuario</a>
            </div>
        </div>

        <!-- jQuery 3 -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-purple',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>
