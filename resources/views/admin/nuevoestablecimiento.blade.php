@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">


<div class="col-md-2 volver">
  <button class="btn2" onclick="go_back()">Volver&nbsp;
      <i class="fa fa-undo" aria-hidden="true"></i>
  </button>
</div>
<div class="container">
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 centrarTituloAdmin">
          <h2>Creá un nuevo establecimiento</h2>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
          <div class="col-md-4 col-sm-4 col-xs-4">
              <hr width="100%">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
             El lugar para dar de alta un nuevo establecimiento&nbsp;&nbsp; <i class="fa fa-pencil"></i>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
              <hr width="100%">
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
          <div class="panel-heading">&nbsp;Nuevo establecimiento</div>
          <div class="panel-body">
              {!! Form::open(['url' => 'admin/establecimiento/nuevo' , 'method' => 'post']) !!}
              <?php 
                      $ciudades = DB::table('ciudad')->get();
                      $arr = array();
                      foreach($ciudades as $ciudad)
                      {
                          $arr[$ciudad->id] = $ciudad->ciudad_nombre;
                      }
              ?>     
            <form>
                <div class="form-group col-md-12">
                  <div class="col-md-6 ">
                      <label>Nombre del establecimiento</label>
                        {!!Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del establecimiento']) !!}
                  </div>
                  <div class="col-md-6 ">
                   <label>¿ Tiene vestuario ?</label>
                      {!! Form::select('tienevestuario', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                      
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <div class="col-md-6">
                       <label>Ciudad</label>
                      {!! Form::select('id_ciudad', $arr , null, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-md-6 ">
                      <label>Dirección</label>
                      {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Direccion']) !!}
                  </div>
                  {!!Form::hidden('id_usuario', Auth::user()->id) !!}
                </div>
                <div style="text-align: center;">
                  <button class="btn2">Agregar</button>
                </div>
              {!! Form::close() !!} 
            </form>
          </div>
      </div>   
    </div>
  </div>
</div>

@endsection
