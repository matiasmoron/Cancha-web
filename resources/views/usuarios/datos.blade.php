@extends('layouts.app')

@section('content')

<script type="text/javascript" src="{{ URL::asset('js/login/login.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/login/login.css')}}">


   <div class="login-form">
        <div class="top-login">
            <span><img src="../public/fotos/group.png" alt=""/></span>
        </div>
        <h1 id="titulo">Datos de tu cuenta</h1>
        <div class="login-top">
            <form  id="form_ingresar" role="form" method="POST" action="{{ url('usuario/editarDatos') }}">
                <div class="login-ic">
                    <i></i>
                     <input type="email" value={{$usuario->name}}  readonly />
                     <div class="clear"> </div>
                </div>
                <div class="login-ic">
                    <i></i>
                      <input type="email" value={{$usuario->email}} readonly />
                     <div class="clear"></div>
                </div>
                <div class="login-ic">
                    <i></i>
                      <input type="email" value={{$usuario->created_at}} readonly />
                     <div class="clear"></div>
                </div>
                <div class="log-bwn">
                    <input type="submit"  value="Editar cuenta" >
                </div>
            </form>
        </div>
    </div> 



{{-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Información de Cuenta</h2>
                <div class="panel-heading">{{$usuario->nombre}}</div>
                <div class="panel-body">
                    <p>E-Mail: {{$usuario->email}}</p>

                    @if($usuario->admin == 1)
                        <p>Administrador: Si</p>
                    @endif

                    <p>Fecha de Creación: {{$usuario->created_at}}</p>

                    {!! Form::open(['route' => ['turnos.cancha' , $usuario->id], 'method' => 'GET'])!!}
                        {!! Form::submit('Editar Cuenta') !!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection