<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CanchaYA!</title>

    <link rel="icon" href="{{asset('pelota.png')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/font-awesome-4.6.3/css/font-awesome.min.css')}}" >

    <!-- Styles -->
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/commons/commons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">

    <!--JS-->
    <script type="text/javascript" src="{{asset('js/jquery-1.12.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/commons.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('css/datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datepicker/bootstrap-datepicker3.standalone.min.css')}}">
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Languaje -->
    <script src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

</head>
<body id="app-layout">

<div id="wrapper">
    <div style="padding-bottom: 10px">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container" >
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                         {{--<img src="{{asset('pelota.png')}}" alt="" />--}}
                        CanchaYa
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   {{--  <ul class="nav navbar-nav navbar-right custom-menu">
                    </ul> --}}
                     <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Ingresar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   Hola  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                                    <li><a href="{{ url('usuarios/turnos') }}"><i class="fa fa-btn glyphicon glyphicon-calendar"></i>Mis Turnos</a></li>
                                    @if( Auth::user()->admin == 1)
                                        <li><a href="{{ url('admin/home') }}">
                                        <i class="fa fa-btn glyphicon glyphicon-th-list">
                                        </i>Administrar</a></li>
                                    @else
                                        <li><a href="{{ url('usuario/datos') }}"><i class="fa fa-btn fa-user"></i>Mi cuenta</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="content">   
        @yield('content')
    </div>
    <div class="footer-distributed">
        <div class="footer-right">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google"></i></a>
        </div>
        <div class="footer-left">
            <p>Matías Moron - Patricio Sartore &copy; 2016</p>
        </div>
    </div>
</div>   
   
</body>
</html>
