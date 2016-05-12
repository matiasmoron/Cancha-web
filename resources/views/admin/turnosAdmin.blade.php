@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Tus Turnos</h2>

                @foreach($turnosAdmin as $turno)
                    <div class="panel-heading">{{$turno->cancha->nombre_cancha}}</div>
                    <div class="panel-body">
                        <p>Día del Turno: {{$turno->dia->dia}}</p>
                        <p>Hora de Inicio: {{$turno->horaInicio}}</p>                       
                        <p>Hora de Fin: {{$turno->horaFin}}</p>
                        <p>Precio Turno: {{$turno->precio_cancha}}</p>

                         @if($turno->adic_luz == 1)
                            <p>Adicional Luz: Si</p>
                            <p>Precio Adicional: {{$turno->precio_adicional}}</p>
                        @else
                            <p>Adicional Luz: No</p>
                        @endif
                
                        {!! Form::open(['route' => ['admin.turno' , $turno->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                            {!! Form::submit('Editar Turno') !!}
                        {!!Form::close()!!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection