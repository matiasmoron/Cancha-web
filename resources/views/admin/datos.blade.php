@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Información de Cuenta</h2>
                <div class="panel-heading">{{$usuario->nombre}}</div>
                <div class="panel-body">
                    <p>E-Mail: {{$usuario->email}}</p>

                    @if($usuario->admin == 1)
                        <p>Administrador: Si</p>
                    @endif

                    <p>Fecha de Creación: {{$usuario->created_at}}</p>

                    {!! Form::open(['route' => ['turnos.cancha' , $usuario->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                        {!! Form::submit('Editar Cuenta') !!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection