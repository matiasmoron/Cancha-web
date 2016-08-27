@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="container " style="padding-top: 5%;">
    <div class="col-md-2">
        <button class="btn2" onclick="go_back()">Volver&nbsp;
            <i class="fa fa-undo" aria-hidden="true"></i>
        </button>
    </div>
  <div class=" col-md-8" style="padding-top: 5%;">
      <div class="panel panel-default">
          <div class="panel-heading">Editar establecimiento</div>
          <div class="panel-body">
              {!! Form::open(['route' => ['admin.establecimiento.modificar' , $establecimiento->id] ,'method' => 'post']) !!} 
            <form>
                <div class="form-group col-md-12">
                  <div class="col-md-6 ">
                      <label>Nombre del establecimiento</label>
                      {!! Form::text('nombre', $establecimiento->nombre, ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-md-6 ">
                       <label>¿ Tiene vestuario ?</label>
                       {!! Form::select('tienevestuario', ['0' => 'No', '1' => 'Si'], $establecimiento->tienevestuario , ['class' => 'form-control']) !!} 
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <div class="col-md-6 ">
                      <label>Ciudad</label>
                      {!! Form::select('id_ciudad', $arrCiudades, $establecimiento->id_ciudad , ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-md-6">
                      <label>Dirección</label>
                      {!! Form::text('direccion', $establecimiento->direccion, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div style="text-align: center;">
                  {{-- {!! Form::submit('Modificar') !!} --}}
                  <button class="btn2">Modificar</button>
                </div>
              {!! Form::close() !!}
                
            </form>
          </div>
      </div>   
  </div>
</div>

@endsection
