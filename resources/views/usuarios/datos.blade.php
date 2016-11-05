@extends('layouts.app')

@section('content')

<script type="text/javascript" src="{{ URL::asset('js/login/login.js') }}"></script>
{{-- <link rel="stylesheet" href="{{ URL::asset('css/login/login.css')}}">--}}
<link rel="stylesheet" href="{{ URL::asset('css/Usuario/user.css')}}">


<div class="portadaUsuario col-md-12 col-sm-12 col-xs-12 ">
</div>
<div class="container">
  <div class="row">  

    <div class="fotoPerfil col-md-3 col-sm-12 col-xs-12 ">
      @if(!is_null(\Auth::user()->facebook()->first()))
      <span><img style= "border-radius: 600px; border: solid 3px;" src="https://graph.facebook.com/v2.6/10210586032597852/picture?type=normal" class="profile-img-card" alt=""/></span>
      @else
      <span><img src="../fotos/group.png" alt=""/></span>
      @endif
    </div>
    <div style="top:30px;" class="col-md-5 col-sm-5 col-xs-12" >
      <br>
      <br>
      <h3 style="color:black">DATOS PERSONALES</h3>
      <br>
      <ul class="list-group">
        <h4 style="color:black">Nombre</h4>
        <li style= "background:white;" type="button" class="list-group-item ">{{$usuario->name}}</li>
        <h4 style="color:black">Email</h4>
        <li style= "background:white;" type="button" class="list-group-item">{{$usuario->email}}</li>
        <h4 style="color:black">Fecha Nacimiento</h4>
        <li style= "background:white;" type="button" class="list-group-item">{{date("d/m/Y", strtotime($usuario->created_at))}}</li>  
        {{-- <h4 style="color:black">Sexo</h4> --}}
        {{-- <li style= "background:white;" type="button" class="list-group-item">
          @if($usuario->"male")
          {{"Hombre"}}</li> --}}  
        </ul>
        @if(is_null(\Auth::user()->facebook()->first()))
        <a href="{{ url('usuario/editarDatos') }}"> <button  style= "float:right;" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#favoritesModal">Editar </button></a>
        @endif
      </div>
      <div id="fotoPelota" style="top:40px;" class="col-md-3 col-sm-2 col-xs-12 ">
        <span><img src="../fotos/pelota2.jpg" alt=""> </span>
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