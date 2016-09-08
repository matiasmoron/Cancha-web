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
      <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
          <h2>Edición de tu cancha</h2>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
          <div class="col-md-4 col-sm-4 col-xs-4">
              <hr width="100%">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
             Cambía las características de tu cancha&nbsp;&nbsp; <i class="fa fa-pencil"></i>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
              <hr width="100%">
          </div>
      </div>
    </div>
  <div class="row">   
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar cancha</div>
            <div class="panel-body">
                {!! Form::open(['route' => ['admin.cancha.modificar' , $cancha->id] ,'method' => 'post']) !!}    
              <form>
                  <div class="form-group col-md-12">
                    <div class="col-md-6 ">
                        <label>Establecimiento</label>
                          {!! Form::select('id_establecimiento', $arrEstablecimientos, $cancha->id_establecimiento, ['class' => 'form-control']) !!}
                    </div>
                     <div class="col-md-6 ">
                        <label>Nombre cancha</label>
                        {!! Form::text('nombre_cancha', $cancha->nombre_cancha, ['class' => 'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="col-md-6 ">
                        <label>¿ Tiene luz ?</label>
                        {!! Form::select('tiene_luz', ['0' => 'No', '1' => 'Si'], $cancha->tiene_luz , ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6 ">
                        <label>¿ Es techada ?</label>
                        {!! Form::select('techada', ['0' => 'No', '1' => 'Si'], $cancha->techada , ['class' => 'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="col-md-6 ">
                        <label>Deporte</label>
                        {!! Form::select('id_deporte', $arrDeportes, $cancha->id_deporte, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        <label>Tipo de superficie</label>
                        {!! Form::select('id_superficie', $arrSuperficies, $cancha->id_superficie, ['class' => 'form-control']) !!}
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
</div>
@endsection