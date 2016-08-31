@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ URL::asset('js/login/login.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/login/login.css')}}">


<div class="login-form">
    <div class="top-login">
        <span><img src="../public/fotos/group.png" alt=""/></span>
    </div>
    <h1 id="titulo">Ingresá y reservá tu cancha YA</h1>
    <div class="login-top">
        <form  id="form_ingresar" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <div class="login-ic">
                <i></i>
                 <input type="email" value="Ingresá tu correo"  name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Ingresá tu correo';}" value="{{ old('email') }}" />
                   @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                <div class="clear"> </div>
            </div>
            <div class="login-ic">
                <i class="icon"></i>
                 <input type="password"  name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                <div class="clear"> </div>
            </div>
            <div class="log-bwn">
                <input type="submit"  value="Ingresar" >
            </div>
            <div style="color:white; padding-top: 10px;">
                <h4>Todavía no tenés una cuenta? <a id="registrarse">Registrate</a></h4>
                <div class="log-bwn">
                    <div class=" social-login">
                        <h4>O ingresá por..</h4>
                        <div class="social-login-buttons">
                            <a class="btn btn-link-1" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-2" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-3" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form  id="form_registrarse" role="form" method="POST" action="{{ url('/register') }}" hidden>
            {!! csrf_field() !!}
            <div class="login-ic {{ $errors->has('name') ? ' has-error' : '' }}">
                <i ></i>
                 <input type="text" value="Ingrese su nombre"  name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Ingrese su nombre';}" value="{{ old('name') }}" />
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                <div class="clear"> </div>
            </div>
            <div class="login-ic {{ $errors->has('email') ? ' has-error' : '' }}">
                <i></i>
                 <input type="email" value="Ingresa tu correo"  name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Ingresá tu correo';}" value="{{ old('email') }}" />
                   @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                <div class="clear"> </div>
            </div>
            <div class="login-ic {{ $errors->has('password') ? ' has-error' : '' }}">
                <i class="icon"></i>
                 <input type="password"  name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                <div class="clear"> </div>
            </div>
            <div class="login-ic {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <i class="icon"></i>
                 <input type="password"  name="password_confirmation" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>

                      @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                <div class="clear"> </div>
            </div>
        
            <div class="log-bwn">
                <input type="submit"  value="Registrarse" >
            </div>
            <div style="color:white; padding-top: 10px;">
                <h4>Ya tenés una cuenta? <a id="ingresar">Ingresá por acá</a></h4>
            </div>
        </form>
        
    </div>
</div> 

{{-- <div class="container">
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
</div>  --}}


@endsection
