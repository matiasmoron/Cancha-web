@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Turnos</h2>
                @foreach($turnosUser as $turno)
                    <div class="panel-heading">{{$turno->turnoAdmin->cancha->establecimiento->nombre}}: {{$turno->turnoAdmin->cancha->nombre_cancha}}</div>
                    <div class="panel-body">
                        <p>Dia: {{$turno->turnoAdmin->dia->dia}}</p>
                        <p>Fecha Inicio: {{$turno->fecha_inicio}}</p>
                        <p>Fecha Fin: {{$turno->fecha_inicio}}</p>
                        <p>Hora Inicio: {{$turno->turnoAdmin->horaInicio}}</p>
                        <p>Hora Fin: {{$turno->turnoAdmin->horaFin}}</p>
                        <p>Precio: {{$turno->precio_cancha}}</p>
                        
                        @if($turno->adic_luz == 1)
                            <p>Adicional Luz: Si</p>
                            <p>Precio Adicional: {{$turno->precio_adicional}}</p>
                        @else
                            <p>Fecha Inicio: No</p>
                        @endif
                        
                        @if($turno->pagado == 1)
                            <p>Pago: Si</p>
                        @else
                            <p>Pago: No</p>
                            {!! Form::open(['route' => ['turnos.cancha' , $turno->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                                {!! Form::submit('Pagar') !!}
                            {!!Form::close()!!}
                        @endif
                        
                        @if($turno->confirmado == 1)
                            <p>Confirmado: Si</p>
                        @else
                            <p>Confirmado: No</p>
                            {!! Form::open(['route' => ['turnos.cancha' , $turno->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                                {!! Form::submit('Confirmar') !!}
                            {!!Form::close()!!}
                        @endif
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection