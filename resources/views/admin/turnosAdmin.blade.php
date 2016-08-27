
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
        <h2 style="text-align: center;">Tus turnos</h2>
        @foreach($turnosAdmin as $turno)
            <div class="col-md-6 col-md-offset-3"> 
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        {{$turno->cancha->nombre_cancha}}
                    </div>
                    <div class="panel-body">
                        <p>Día del Turno: {{$turno->dia->dia}}</p>
                        <p>Hora de Inicio: {{$turno->horaInicio}}</p>                       
                        <p>Hora de Fin: {{$turno->horaFin}}</p>
                        <p>Precio Turno: $ {{$turno->precio_cancha}}</p>

                         @if($turno->adic_luz == 1)
                            <p>Adicional Luz: Si</p>
                            <p>Precio Adicional: $ {{$turno->precio_adicional}}</p>
                        @else
                            <p>Adicional Luz: No</p>
                        @endif
                
                        {!! Form::open(['route' => ['admin.turno' , $turno->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                        <button class="btn2">Editar turno</button>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection 