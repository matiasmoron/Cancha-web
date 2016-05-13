@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Turno</div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['admin.cancha.modificar' , $cancha->id] ,'method' => 'post']) !!}    
                        
                        <div class="form-group">
                            {!! Form::select('id_establecimiento', $arrEstablecimientos, $cancha->id_establecimiento, ['class' => 'form-control']) !!}
                            {!! Form::text('nombre_cancha', $cancha->nombre_cancha, ['class' => 'form-control']) !!}
                            {!! Form::select('cant_jugadores', $arrCantJugad , $cancha->cant_jugadores, ['class' => 'form-control']) !!}
                            {!! Form::select('tiene_luz', ['0' => 'No', '1' => 'Si'], $cancha->tiene_luz , ['class' => 'form-control']) !!}
                            {!! Form::select('techada', ['0' => 'No', '1' => 'Si'], $cancha->techada , ['class' => 'form-control']) !!}
                            {!! Form::select('id_deporte', $arrDeportes, $cancha->id_deporte, ['class' => 'form-control']) !!}
                            {!! Form::select('id_superficie', $arrSuperficies, $cancha->id_superficie, ['class' => 'form-control']) !!}
                        </div>
					   
                        {!! Form::submit('Modificar') !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
