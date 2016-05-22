@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @foreach($establecimientos as $establ)
                    <div class="panel-heading">{{$establ->nombre}}
                    </div>
                    <div class="panel-body">
                        <p>Direccion: {{$establ->direccion}}</p>
                        <div class="panel-body">
                            @foreach($establ->canchas as $cancha)
                                <p>Cantidad Jugadores: {{$cancha->cant_jugadores}}</p>
                                <p>Superficie: {{$cancha->superficie->superficie}}</p>
                                <div class="panel-body">
                                    @foreach($cancha->turnosPorFecha($fecha) as $turno)
                                        <p>Hora Inicio: {{$turno->horaInicio}}</p>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
				@endforeach
            </div>
        </div>
    </div>
</div>
@endsection