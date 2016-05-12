@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Turno</div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['admin.turno' , $turnoAdmin->id] ,'method' => 'post']) !!}    
                        
                        <div class="form-group">
                            {!! Form::select('id_cancha', $arrCanchas , $turnoAdmin->cancha->id, ['class' => 'form-control']) !!}
                            {!! Form::select('id_dia', $arrDias , $turnoAdmin->dia->id, ['class' => 'form-control']) !!}
                            {!!Form::time('horaInicio', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            {!!Form::time('horaFin', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            {!! Form::hidden('id_usuario_admin', Auth::user()->id) !!}
                        </div>
					   
                        {!! Form::submit('Agregar') !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
