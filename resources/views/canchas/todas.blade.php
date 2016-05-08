@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
				<h2 style="padding-bottom:20px;">Canchas</h2>
                <div>
				    {!! Form::open(['url' => 'canchas/todas', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role'=> 'search'])!!}
					<div class="form-group">
						{!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Establecimiento']) !!}
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				    {!!Form::close()!!}
                </div>
                @foreach($canchas as $cancha)
                    @if($cancha->establecimiento->id_ciudad == $ciudad)
                    <div class="panel-heading">{{$cancha->establecimiento->nombre}}</div>
                    <div class="panel-body">
                        <p>Ciudad: {{$cancha->establecimiento->ciudad->ciudad_nombre}}</p>
                        <p>Provincia: {{$cancha->establecimiento->ciudad->provincia->provincia_nombre}}</p>
                        <p>Domicilio: {{$cancha->establecimiento->direccion}}</p>
                        <div class="panel-heading">{{$cancha->nombre_cancha}}</div>
                        <div class="panel-body">
                            <p>Cantidad Jugadores: {{$cancha->cant_jugadores}}</p>
                            <p>Superficie: {{$cancha->superficie->superficie}}</p>
                            {!! Form::open(['route' => ['turnos.cancha' , $cancha->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                                {!! Form::submit('Pedir Turno') !!}
                            {!!Form::close()!!}
                        </div>
                    </div>
                    @endif
				@endforeach
            </div>
        </div>
    </div>
</div>
@endsection