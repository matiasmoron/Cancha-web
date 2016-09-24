@extends('layouts.app')

@section('content')

<script type="text/javascript" src="{{ URL::asset('js/login/login.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/login/login.css')}}">


<style type="text/css">
    body{
        background: url('../fotos/fondo_usuario.jpg');
    }
</style>
       <div class="login-form ">
            <div class="top-login" style="background:black;">
            <span><img src="../fotos/group.png" alt=""/></span>
            </div>
            <h1 id="titulo">Datos de tu cuenta</h1>
            <div class="login-top" >
                {!! Form::open(['route' => 'usuario.editarDatos' , 'id'=> "form_ingresar", 'role' => 'form','method' => 'get']) !!}
                    <div class="login-ic" style="background:black;">
                        <i></i>
                         <input type="text" value={{$usuario->name}}  readonly />
                         <div class="clear"> </div>
                    </div>
                    <div class="login-ic" style="background:black;">
                        <i></i>
                          <input type="email" value={{$usuario->email}} readonly />
                         <div class="clear"></div>
                    </div>
                    <div class="login-ic" style="background:black;">
                        <i></i>
                          <input type="text" value={{date("d/m/Y", strtotime($usuario->created_at))}} readonly />
                         <div class="clear"></div>
                    </div>
                    <div class="log-bwn"> 
                      {!!Form::submit('Editar Datos', ['class' => 'btn btn-default boton btn-reserva'])!!}  
                    </div>
                {!!Form::close()!!}
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