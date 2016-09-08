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

@endsection
