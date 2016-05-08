@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Turnos para {{$turnos[0]->cancha->establecimiento->nombre}}: {{$turnos[0]->cancha->nombre_cancha}} </h2>
                @foreach($turnos as $turno)
                    <div class="panel-body">
                        <p>Fecha Inicio: {{$turno->fecha_inicio}}</p>
                        <p>Fecha Fin: {{$turno->fecha_inicio}}</p>
                        <p>Precio: {{$turno->precio_cancha}}</p>
                        
                        @if($turno->adic_luz == 1)
                            <p>Adicional Luz: Si</p>
                            <p>Precio Adicional: {{$turno->precio_adicional}}</p>
                        @else
                            <p>Adicional Luz: No</p>
                        @endif
                        
                        @if($turno->estado == 1)
                            <p>Disponible: Si</p>
                            {!! Form::open(['route' => ['turnos.cancha' , $turno->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                                {!! Form::submit('Reservar Turno') !!}
                                {!!Form::close()!!}
                        @else
                            <p>Disponible: No</p>
                        @endif
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection