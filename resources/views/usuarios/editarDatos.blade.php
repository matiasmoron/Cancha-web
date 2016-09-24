@extends('layouts.app')

@section('content')

<script type="text/javascript" src="{{ URL::asset('js/login/login.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/login/login.css')}}">


<style type="text/css">
    body{
        background: url('../fotos/fondo_usuario.jpg');
    }
</style>
      <div class="container">
        <div class="login-form col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h1 id="titulo">Edita de tu cuenta</h1>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="top-login">
                <span><img src="../fotos/group.png" alt=""/></span>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1" >
              <div class="login-top">
                {!! Form::open(['route' => 'usuario.guardarDatos' , 'id'=> "form_ingresar", 'role' => 'form','method' => 'post']) !!}
                    <div class="login-ic" style="background:black;">
                        <i></i>
                         <input type="text" value={{$usuario->name}} name="name">
                         <div class="clear"> </div>
                    </div>
                    <div class="login-ic" style="background:black;">
                        <i></i>
                          <input type="email" value={{$usuario->email}} name="email">
                         <div class="clear"></div>
                    </div>
                    <div class="login-ic" style="background:black;">
                        <i></i>
                          <input type="password" name="password">
                         <div class="clear"></div>
                    </div>
                    <div class="login-ic" style="background:black;">
                        <i></i>
                          <input type="password" name="passwordConf">
                         <div class="clear"></div>
                    </div>
                    <div class="log-bwn">
                        {!!Form::submit('Guardar Datos', ['class' => 'btn btn-default boton btn-reserva'])!!}
                    </div>
                {!!Form::close()!!}
              </div>
            </div>
        </div>
      </div>

<script>
  @if(notify()->ready())
    swal({
        title: "{{notify()->message()}}",
        type: "{{notify()->type()}}",
    });
    @endif
</script>

@endsection