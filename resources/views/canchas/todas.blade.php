@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
				<h2 style="padding-bottom:20px;">Canchas</h2>
						<div class="panel-heading">{{$cancha[0]->establecimiento->nombre}}</div>
						<div class="panel-body">
							<p>Ciudad: {{$cancha[0]->establecimiento->ciudad}}</p>
							<p>Provincia: {{$cancha[0]->establecimiento->provincia}}</p>
							<p>Domicilio: {{$cancha[0]->establecimiento->direccion}}</p>
						</div>
						<div class="panel-body">
							<p>Ciudad: {{$cancha['nombre']}}</p>
						</div>
            </div>
        </div>
    </div>
</div>
@endsection