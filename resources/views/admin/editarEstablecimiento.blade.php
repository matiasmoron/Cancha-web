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
            <h2>Panel de administración</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               Administración central de tu cuenta&nbsp;&nbsp; <i class="fa fa-pencil"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
        </div>
  </div>
  <div class="row">
    @include('partials/errors')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">&nbsp;Editar establecimiento</div>
            <div class="panel-body">
                {!! Form::open(['route' => ['admin.establecimiento.modificar'] ,'method' => 'post']) !!} 
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
                    {!! Form::hidden('id', $establecimiento->id) !!}
                  </div>
                  <div style="text-align: center;">
                    {{-- {!! Form::submit('Modificar') !!} --}}
                    <button class="btn2">Modificar</button>
                  </div>
                {!! Form::close() !!}
            </div>
        </div>   
    </div>
  </div>
</div>

@endsection
