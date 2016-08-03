@extends('layouts.app')

@section('content')
{{-- <script type="text/javascript" src="{{ URL::asset('js/login/login.js') }}"></script> --}}
{{-- <link rel="stylesheet" href="{{ URL::asset('css/login/login.css')}}"> --}}

<div class="container">
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 


{{--  <h1>Ingresá y reservá tu cancha!</h1> --}}

    {{-- <div class="container w3l">
        <span title="Registrate" class="button"> +</span>
        <div class="content">
            <div class="head">
                <h3>Registrarse</h3>
            </div>
            <div class="body">
                <div class="login-top sign-top w3-agile">
                    <form action="{{ url('/login') }}" method="post">
                     
                        <input type="text" name="Name" class="name active " placeholder="Your Name" required="">
                        <input type="text" name="Email" class="email" placeholder="Email" required>
                        <input type="password" name="Password" class="password" placeholder="Contraseña" required="">
                        <input type="checkbox" id="brand1" value="">
                        <label for="brand1"><span></span> Recordarme</label>
                        <div class="login-bottom">
                            <div class="forgot">
                                <a href="{{ url('/password/reset') }}">Olvidaste tu contraseña?</a>
                            </div>
                            <div class="sub">

                                <input type="submit" value="SIGN UP">

                            </div>

                            <div class="clear"></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

   
    <div class="login-inner">
        <div class="log-head">
            <h2>Ingresar</h2>
        </div>
        <div class="login-top">
            <form action="{{ url('/login') }}" method="post">
            {!! csrf_field() !!}
                <input type="text" name="Email" class="email " placeholder="Email"  />
                <input type="password" name="Password" class="password " placeholder="Contraseña"  />
                <input type="checkbox" id="brand" value="">
                <label for="brand"><span></span> Recordarme</label>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif 
                <div class="login-bottom">
                    <ul>
                        <li>
                            <a href="{{ url('/password/reset') }}">Olvidaste tu contraseña?</a>
                        </li>
                        <li>
                            <form>
                                <input type="submit" value="Ingresar" />
                            </form>
                        </li>
                        <ul>
                            <div class="clearfix"></div>
                </div>
            </form>

            <div class="clearfix"></div>

        </div>
        <div class="social-icons">
            <ul>
                <li><a href="#"><span class="icons"></span><span class="text">Facebook</span></a></li>
                <li class="twt"><a href="#"><span class="icons"></span><span class="text">Twitter</span></a></li>
                <li class="ggp"><a href="#"><span class="icons"></span><span class="text">Google+</span></a></li>

                <div class="clearfix"> </div>
            </ul>
        </div>
    </div>
    
    <div class="clearfix"> </div>  --}}


@endsection
