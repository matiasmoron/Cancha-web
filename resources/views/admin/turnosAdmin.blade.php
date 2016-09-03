
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="col-md-2" style="padding-top: 5%;">
        <button class="btn2" onclick="go_back()">Volver&nbsp;
            <i class="fa fa-undo" aria-hidden="true"></i>
        </button>
    </div>
<div class="container" >
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
            <h2>Administración de turnos</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               Administrá tus turnos&nbsp;&nbsp; <i class="fa fa-pencil"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
        </div>
    </div>
    <div class="row">
    
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