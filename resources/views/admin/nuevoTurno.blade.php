
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="container " style="padding-top: 5%;">
    <div class="col-md-2">
        <button class="btn2" onclick="go_back()">Volver&nbsp;
            <i class="fa fa-undo" aria-hidden="true"></i>
        </button>
    </div>
    
<div class="col-md-8 " style="padding-top: 5%;">
    <div class="panel panel-default">
        <div class="panel-heading">Nueva turno</div>
        <div class="panel-body">
             {!! Form::open(['url' => 'admin/turno/nuevo' , 'method' => 'post']) !!}    
                    
                                    
          <form>
              <div class="form-group col-md-12">
                <div class="col-md-6 ">
                    <label>Cancha</label>
                     {!! Form::select('id_cancha', $arrCanchas , null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-6 ">
                    <label>Día</label>
                    {!! Form::select('id_dia', $arrDias , null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="form-group col-md-12">
                    <div class="col-md-6 ">
                        <label>Hora de inicio</label>
                        {!!Form::time('horaInicio', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        <label>Hora de fin</label>
                       {!!Form::time('horaFin', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4">
                        <label>Precio del turno</label>
                       {!!Form::number('precio_cancha', null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        <label>¿Precio adicional por luz?</label>
                       {!! Form::select('adic_luz', ['0' => 'No', '1' => 'Si'] , null , ['class' => 'form-control','id'=>'adic_luz']) !!}
                    </div>
                    <div class="col-md-4" disabled>
                        <label>Precio adicional</label>
                        {!!Form::number('precio_adicional', null , ['class' => 'form-control', disabled]) !!}
                    </div>
                </div>
                {!! Form::hidden('id_usuario_admin', Auth::user()->id) !!}
              <div style="text-align: center;">
                <button class="btn2">Agregar</button>
              </div>
            {!! Form::close() !!}
          </form>
        </div>
    </div>   
</div>

<script type="text/javascript">
    
    $("#adic_luz").change(function(){
        if($(this).val())

    });

</script>
@endsection
