<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Examen | Registro Usuario</title>
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="#"><b>Omnilife</b>EXAMEN</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Registra un nuevo usuario.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group has-feedback @error('name') has-error @enderror">
                        <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" value="{{ old('name') }}" autocomplete="name" autofocus required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group has-feedback @error('email') has-error @enderror">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" autocomplete="email" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        @error('email')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group has-feedback @error('password') has-error @enderror">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" autocomplete="new-password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        @error('password')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group has-feedback">
                        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Confirma Contraseña" autocomplete="new-password" required>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <a href="{{ route('login') }}" class="btn btn-danger btn-block btn-flat"><i class="fa fa-remove"></i> Cancelar</a>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <button type="submit" class="btn bg-purple btn-block btn-flat"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- jQuery 3 -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>
