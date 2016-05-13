@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Tus Canchas</h2>
                @foreach($establecimientos as $establecimiento)
                    @foreach($establecimiento->canchas as $cancha)
                    <div class="panel-heading">{{$cancha->nombre_cancha}}</div>
                    <div class="panel-body">
                        <p>Establecimiento: {{$establecimiento->nombre}}</p>
                        <p>Cantidad de Jugadores: {{$cancha->cant_jugadores}}</p>
                                            
                        @if($cancha->tiene_luz == 1)
                            <p>Posee Luz: Si</p>
                        @else
                            <p>Posee Luz: No</p>
                        @endif
                        
                        @if($cancha->techada == 1)
                            <p>Techada: Si</p>
                        @else
                            <p>Techada: No</p>
                        @endif
                        
                        <p>Deporte: {{$cancha->deporte->deporte}}</p>
                        <p>Superficie: {{$cancha->superficie->superficie}}</p>
                                            
                        {!! Form::open(['route' => ['admin.cancha.editar' , $cancha->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                            {!! Form::submit('Editar Cancha') !!}
                        {!!Form::close()!!}
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection