<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }} | {{ $title }}</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">

        @yield('css')

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('dist/css/toastr.min.css') }}">
    </head>

    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="{{ route('staff.index') }}" class="logo">
                    <span class="logo-mini"><b>O</b>EX</span>
                    <span class="logo-lg"><b>Omnilife</b>EXAMEN</span>
                </a>

                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('dist/img/avatar5.png') }}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">

                                        <p>
                                            {{ Auth::user()->name }}
                                            <small>{{ Auth::user()->email }}</small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-danger btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Cerrar Sesi&oacute;n</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                        </div>

                        <div class="pull-left info">
                            <p>{{ $user[0] }}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Activo</a>
                        </div>
                    </div>

                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MEN&Uacute; DE NAVEGACI&Oacute;N</li>
                        <li class="treeview{{ $menuActive == 'staff' ? ' active' : '' }}">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Empleados</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ $submenuActive == 'staff-list' ? ' active' : '' }}"><a href="{{ route('staff.index') }}"><i class="fa fa-search"></i> Consulta</a></li>
                                <li class="{{ $submenuActive == 'staff-new' ? ' active' : '' }}"><a href="{{ route('staff.new') }}"><i class="fa fa-user-plus"></i> Nuevo</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>

            @yield('content')

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>

                <strong>Copyright &copy; {{ date('Y') }} <a href="https://www.linkedin.com/in/cdanihb" target="_blank">Christian Herrera</a>.</strong>
            </footer>
        </div>

        <!-- jQuery 3 -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('dist/js/toastr.min.js') }}"></script>

        @yield('js')

        <script>
            $(document).ready(function () {
                $('.sidebar-menu').tree()
            });
        </script>
    </body>
</html>
