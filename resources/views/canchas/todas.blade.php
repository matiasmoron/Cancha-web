@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
				<h2 style="padding-bottom:20px;">Canchas</h2>
				{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role'=> 'search'])!!}
					<div class="form-group">
						{!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Establecimiento']) !!}
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				{!!Form::close()!!}
					@foreach($canchas as $cancha)
						<div class="panel-heading">{{$cancha->establecimiento->nombre}}</div>
						<div class="panel-body">
							<p>Ciudad: {{$cancha->establecimiento->ciudad}}</p>
							<p>Provincia: {{$cancha->establecimiento->provincia}}</p>
							<p>Domicilio: {{$cancha->establecimiento->direccion}}</p>
							<div class="panel-heading">{{$cancha->nombre}}</div>
							<div class="panel-body">
								<p>Cantidad Jugadores: {{$cancha->cantjugadores}}</p>
							</div>
						</div>
						@endforeach
            </div>
        </div>
    </div>
</div>
@endsection