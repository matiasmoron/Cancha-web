@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Turnos</h2>
                @foreach($turnos as $turno)
                    <div class="panel-heading">{{$turno->cancha->nombre_cancha}}</div>
                    <div class="panel-body">
                        <p>Fecha: {{$turno->fecha_inicio}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection