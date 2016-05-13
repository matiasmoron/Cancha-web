@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Turnos para {{$turnos[0]->cancha->establecimiento->nombre}}: {{$turnos[0]->cancha->nombre_cancha}} </h2>
                @foreach($turnos as $turno)
                    <div class="panel-body">
                        <p>Dia: {{$turno->dia->dia}}</p>
                        <p>Hora Inicio: {{$turno->horaInicio}}</p>
                        <p>Hora Fin: {{$turno->horaFin}}</p>
                        <p>Precio Turno: {{$turno->precio_cancha}}</p>
                        
                        @if($turno->adic_luz == 1)
                            <p>Adicional Luz: Si</p>
                            <p>Precio Adicional: {{$turno->precio_adicional}}</p>
                        @else
                            <p>Adicional Luz: No</p>
                        @endif
                        
                        {!! Form::open(['route' => ['turnos.reserva' , $turno->id, $turno->dia->dia_ingles, $turno->horaInicio, $turno->horaFin], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                                {!! Form::submit('Reservar Turno') !!}
                        {!!Form::close()!!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection