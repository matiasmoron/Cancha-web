@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="acomodar col-md-16 col-sm-16 col-xs-16 col-md-offset-0">
			<ol class="lista">
				<div class="col-md-16 col-sm-16 col-xs-16 col-md-offset-0">
					<h2 class="acomodarTitulo">Canchas Disponibles para {{date('d/m/Y', strtotime($fecha))}}<h2>
				</div>
				<?php $panel = 1 ?> 
				@foreach($canchas as $cancha)
				<li class="recuadro">
					<div class="cont container">
						<div class="col-md-2 col-sm-2 col-xs-2">
							<a href="/">
								<img class="foto" src={{asset('/fotos/futbol.jpg')}}>
							</a>
						</div>
						<div class="personaData col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<p class="nombre">{{$cancha->nombre}}</p>
							</div>
							<div class="datosDesap1 col-md-12 col-sm-12 col-xs-12">
								<div class="dato col-md-4 col-sm-4 col-xs-4">
									<span class="info1">Cancha: {{$cancha->nombre_cancha}}</span>
								</div>
								<div class="dato col-md-4 col-sm-4 col-xs-4">
									<span class="info1">Jugadores: {{$cancha->cant_jugadores}}</span>
								</div>
								<div class="dato col-md-4 col-sm-4 col-xs-4">
									<span class="info1">Direccion: {{$cancha->direccion}}</span>
								</div>	
							</div>
							<div class="datosDesap2 col-md-12 col-sm-12 col-xs-12">
								<div class="dato col-md-3 col-sm-3 col-xs-3">
									<p class="info2">Precio:</p>
									<p class="info2">{{$cancha->precio_cancha}}</p>
								</div>
								<div class="dato col-md-3 col-sm-3 col-xs-3">
									<p class="info2">Lugar:</p>
									<p class="info2"></p>
								</div>
								<div class="dato col-md-3 col-sm-3 col-xs-3">
									<p class="info2">Teléfono:</p>
									<p class="info2"></p>
								</div>
								<div class="dato col-md-3 col-sm-3 col-xs-3">
									<p class="info2">Teléfono Alter:</p>
									<p class="info2"></p>
								</div>
							</div>
							<div class="panel-group col-md-12 col-sm-12 col-xs-12" id="accordion" role="tablist" aria-multiselectable="false">
								<div class="panel panel-default">
	    							<div class="panel-heading" role="tab" id=<?php echo $panel?>>
								      <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion" href=<?php echo "#collapse".$panel?> aria-expanded="false" aria-controls=<?php echo "collapse".$panel?>> Turnos </a>
								      </h4>
								    </div>
								    <div id=<?php echo "collapse".$panel?> class="panel-collapse collapse in" role="tabpanel" aria-labelledby=<?php echo $panel?>>
									    <div class="panel-body">
									    	<?php 	$horaIni = explode(",", $cancha->horaIni);
									    			$horaFin = explode(",", $cancha->horaFin);
									    			$indice = 0;								?>
									      	<ol class="listaTurnos">
									      		<li class="recuadro">
										      		<div class="cont container">
										      			@foreach($horaIni as $HI)
										      				<div class="col-md-4 col-sm-4 col-xs-4">
										      					<p>Hora Inicio: {{$HI}}</p>
										      				</div>
										      				<div class="col-md-4 col-sm-4 col-xs-4">
										      					<p>Hora Fin: {{$horaFin[$indice]}}</p>
										      				</div>
										      				<div class="col-md-4 col-sm-4 col-xs-4">
										      					{!! Form::open(['url' => 'turno/reservar/previsualizar' , 'method' => 'post']) !!}
										      						{!!Form::hidden('id_establecimiento', $cancha->id_est)!!}
										      						{!!Form::hidden('id_cancha', $cancha->id_can)!!}
										      						{!!Form::hidden('horaInicio', $HI)!!}
										      						{!!Form::hidden('horaFin', $horaFin[$indice])!!}
										      						{!!Form::hidden('dia', $dia)!!}
										      						{!!Form::hidden('arrayHoraIni', $cancha->horaIni)!!}
										      						{!!Form::hidden('arrayHoraFin', $cancha->horaFin)!!}
										      						{!!Form::hidden('fecha', $fecha)!!}					
										      						{!! Form::submit('Información Turno', ['class' => 'btn btn-default boton']) !!}
																{!! Form::close() !!}
										      				</div>
										      				<?php $indice++;?>
										      			@endforeach
										      		</div>
									      		</li>
									      	</ol>
									    </div>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<?php $panel++?>
				@endforeach
			</ol>
		</div>
	</div>
</div>


@endsection