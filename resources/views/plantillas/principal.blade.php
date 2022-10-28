<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SOMAPRI</title>

    <link rel="apple-touch-icon" href="apple-icon.png">

    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link href="{!! asset('css/bootstrap-theme.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/themify-icons.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/flag-icon.min.css') !!}">

    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/sweetalert.css') !!}">

    <link href="https://fonts.googleapis.com/css?family=Poppins|Sintony&display=swap" rel="stylesheet">

    <style>
        button, th {
            font-family: 'Sintony'
        }

        .btn-sm {
            border-radius: 20%;
            border: 2px solid #006;
        }

        .btn-primary {
            border-radius: 5%;

        }

        .buscador {
            height: 70%;
            border-radius: 100%;
            border: none;
            outline: none;
            box-shadow: 0 5px 6px rgba(0, 0, 0, 0.16), 0 3px 6px
        }
    </style>
</head>

<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel" style="background: #263238">
    <nav class="navbar navbar-expand-sm navbar-default" style="background: #263238">

        <div class="navbar-header miclase">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand"><img style="width: 50%" src="{!! asset('img/somapri2.png') !!}"><br><br></a>

        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(Auth::user()->rol === 'Administrador')
                    <li>
                        <a href="{{ route('usuarios.index') }}" style="font-family: 'Sintony'"> <i
                                class="menu-icon fa fa-user" title="Usuarios"></i>Usuarios </a>
                    </li>
                @endif

                    <li>
                        <a href="{{ route('clientes.index') }}" style="font-family: 'Sintony'"> <i
                                class="menu-icon fa fa-male" title="Clientes"></i>Clientes </a>
                    </li>

                <li>
                    <a href="{{ route('productos.index') }}" style="font-family: 'Sintony'"> <i
                            class="menu-icon fa fa-list" title="Productos"></i>Productos </a>
                </li>
                <li>
                    <a href="{{ route('ventas.index') }}" style="font-family: 'Sintony'"> <i
                            class="menu-icon fa fa-usd" title="Ventas"></i>Ventas </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#modalAcerca" style="font-family: 'Sintony'"> <i
                            class="menu-icon fa fa-info" title="Acerca de"></i>Acerca de </a>
                </li>


                <li>
                    <a href="{{ route('usuarios.logout') }}" style="font-family: 'Sintony'"
                       onclick="return confirm('¿Estás seguro de cerrar sesión?')"> <i
                            class="menu-icon fa fa-sign-out" title="Salir"></i>Salir </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header" style="margin-bottom: 10px">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left" style="background-color: #24a08d"><i
                        style="margin-top: 14px" class="fa fa fa-tasks"></i></a>
            </div>

            <div class="col-sm-5">
                @if(Auth::user())
                    <div class="user-area dropdown float-right">
                        <h5>Usuario: {{Auth::user()->nombre_completo}}</h5>
{{--                        <h5>Rol: {{Auth::user()->rol}}</h5>--}}
                    </div>
                @endif

            </div>

        </div>

    </header><!-- /header -->
    <!-- Header-->
   @yield('contenido')
</div><!-- /#right-panel -->
<div id="appModal">
    @include("plantillas.modal")
</div>
<!-- Right Panel -->
</body>
</html>
<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/popper.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/main.js') !!}"></script>
