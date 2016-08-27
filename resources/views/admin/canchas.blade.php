@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="container" style="padding-top: 5%;">
    <div class="col-md-2">
        <button class="btn2" onclick="go_back()">Volver&nbsp;
            <i class="fa fa-undo" aria-hidden="true"></i>
        </button>
    </div>
    <div class="row" style="padding-top: 5%;">
        <h2 style="text-align: center;">Tus canchas</h2>
        @foreach($establecimientos as $establecimiento)
            @if(sizeof($establecimiento->canchas) >0)
                <div class="col-md-6 col-md-offset-3"> 
                    <div class="panel panel-default" >
                        <div class="panel-heading" data-toggle="collapse" data-target={{"#id_".$establecimiento->id}} aria-expanded="true">
                            {{$establecimiento->nombre}}
                        </div>
                        <div class="panel-body collapse in" id={{"id_".$establecimiento->id}} aria-expanded="true">
                            @foreach($establecimiento->canchas as $cancha)
                                <div class="col-md-12 ">
                                    <div class="panel panel-default" >
                                        <div class="panel-heading">{{$cancha->nombre_cancha}}</div>
                                        <div class="panel-body">
                                           {{--  <p>Establecimiento: {{$establecimiento->nombre}}</p> --}}
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
                                            <button class="btn2">Editar cancha</button>
                                            {!!Form::close()!!}
                                         </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

@endsection
