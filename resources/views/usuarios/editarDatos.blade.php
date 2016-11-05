@extends('layouts.app')

@section('content')

<script type="text/javascript" src="{{ URL::asset('js/login/login.js') }}"></script>
{{-- <link rel="stylesheet" href="{{ URL::asset('css/login/login.css')}}">
--}}
<link rel="stylesheet" href="{{ URL::asset('css/Usuario/user.css')}}">

<div class="container" style="width:100%">
  <div class="row">
    <div class="portadaUsuario col-md-12 col-sm-12 col-xs-12 ">
    </div>

    <div class="col-md-12 image" style="top:50px;">

      <div class="fotoPerfil col-md-3 col-sm-12 col-xs-12">
        <img src="../fotos/group.png" alt=""/>
      </div>


      <div class="col-md-7 col-sm-6 col-xs-12">
        {!! Form::open(['route' => 'usuario.guardarDatos' , 'id'=> "form_ingresar", 'role' => 'form','method' => 'post']) !!}
          <h3 style="color:black; ">EDITA TUS DATOS</h3>
          <div class="col-md-8">
            {!!Form::label('labelName', 'Nombre')!!}
            {!!Form::text('name',$usuario->name,['class' => 'form-control'])!!}
          </div>
          <div class="col-md-8">
            {!!Form::label('labelEmail', 'Email')!!}
            {!!Form::text('email',$usuario->email,['class' => 'form-control'])!!}
          </div>
          <div class="col-md-8">
            {!!Form::label('labelFechaNac', 'Fecha Nacimiento')!!}
            {!!Form::text('fechaNac',$usuario->creted_at,['class' => 'form-control'])!!}
          </div>
          {{-- <div class="col-md-8">
            {!!Form::label('labelSexo', 'Sexo')!!}
            {!!Form::text('sexo',null,['class' => 'form-control'])!!}
          </div> --}}
          <div class="col-md-8">
            {!!Form::label('labelPassword', 'Contraseña')!!}
            {!!Form::text('password',"****",['class' => 'form-control'])!!}
          </div>
          <div class="col-md-8">
            {!!Form::label('labelPasswordConf', 'Confirmar Contraseña')!!}
            {!!Form::text('passwordConf',"******",['class' => 'form-control'])!!}
          </div>
          <div style="padding-top:13px;" class="col-md-8">
            {!!Form::submit('Guardar Cambios', ['class' => 'btn btn-success'])!!}
            {!!Form::submit('Cancelar', ['class' => 'btn btn-danger'])!!}
          </div>
        {!!Form::close()!!}
      </div>
      {{--     {!!Form::submit('Guardar Datos', ['class' => 'btn btn-default boton btn-reserva'])!!}--}}   
    </div>
  </div>
</div>





{{-- <div class="container">
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
        <div class="login-ic" style="background:white;">
          <i></i>
          <input type="text" value={{$usuario->name}} name="name">
          <div class="clear"> </div>
        </div>
        <div class="login-ic" style="background:white;">
          <i></i>
          <input type="email" value={{$usuario->email}} name="email">
          <div class="clear"></div>
        </div>
        <div class="login-ic" style="background:white;">
          <i></i>
          <input type="password" name="password">
          <div class="clear"></div>
        </div>
        <div class="login-ic" style="background:white;">
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
--}}
<script>
  @if(notify()->ready())
  swal({
    title: "{{notify()->message()}}",
    type: "{{notify()->type()}}",
  });
  @endif
</script>

@endsection