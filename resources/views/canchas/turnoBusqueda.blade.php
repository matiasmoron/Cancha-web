@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
    		<h3>Nuestras Canchas Disponibles</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<i class="fa fa-btn glyphicon glyphicon-calendar"></i>¡Estas son las canchas que tenemos disponible para el {{date('d/m/Y', strtotime($fecha))}}!
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12">
	    	<div class="col-md-2 col-sm-2 col-xs-2 menuIzq">
	    		<p> Menu </p>
	    	</div>
	        <div class="acomodar col-md-10 col-sm-10 col-xs-10">
				<ol class="lista">
					<?php $panel = 1 ?> 
					@foreach($canchas as $cancha)
					<li class="recuadro">
						<div class="cont container">
							<div class="col-md-2 col-sm-2 col-xs-2">
								<a href="/">
									<img class="foto" src={{asset('/fotos/futbol.jpg')}}>
								</a>
							</div>
							<div class="TurnoData col-md-10 col-sm-10 col-xs-10">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<p class="nombreEstabl">{{$cancha->nombre}}</p>
								</div>
								<div class="datosFila1 col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-3 col-sm-3 col-xs-3">
										<img src={{asset('/fotos/icon-cancha2.png')}}><span class="info1">{{$cancha->nombre_cancha}}</span>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<i class="fa fa-btn glyphicon glyphicon-user"></i><span class="info1">{{$cancha->cant_jugadores}} Jugadores por Equipo</span>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<i class="fa fa-btn glyphicon glyphicon-tag"></i><span class="info1">{{$cancha->direccion}}</span>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2">
										<i class="fa fa-btn glyphicon glyphicon-leaf"></i><span class="info1">{{$cancha->superficie}}</span>
									</div>	
								</div>
								<div class="panel-group col-md-12 col-sm-12 col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel">
		    							<div class="panel-heading" role="tab" id=<?php echo $panel?> style="padding-left:0px;">
									      <h4 class="panel-title">
									        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href=<?php echo "#collapse".$panel?> aria-expanded="false" aria-controls=<?php echo "collapse".$panel?>>Ver Turnos</a><i class="fa fa-btn glyphicon glyphicon-chevron-down" style="text-align: right;"></i>
									      </h4>
									    </div>
									    <div id=<?php echo "collapse".$panel?> class="panel-collapse collapse" role="tabpanel" aria-labelledby=<?php echo $panel?>>
										    <div class="panel-body">
										    	<div class="col-md-12 col-sm-12 col-xs-12">
										        	<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
										        		<p>Horario de Inicio</p>
										        	</div>
										        	<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
										        		<p>Horario de Finalización</p>
										        	</div>
										        	<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center;">
										        		<p>Precio</p>
										        	</div>
										        	<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: right;">
										        		<i class="fa fa-btn glyphicon glyphicon-share-alt"></i>
										        	</div>
										        </div>
										    	<?php 	$horaIni = explode(",", $cancha->horaIni);
										    			$horaFin = explode(",", $cancha->horaFin);
										    			$precios = explode(",", $cancha->precios);
										    			$indice = 0;								?>
										      	<ol class="listaTurnos col-md-12 col-sm-12 col-xs-12">
										      		<li>
										      			@foreach($horaIni as $HI)
										      				<div class="col-md-12 col-sm-12 col-xs-12">
											      				<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
											      					<p>{{substr($HI,0,5)}} Hs</p>
											      				</div>
											      				<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
											      					<p>{{substr($horaFin[$indice],0,5)}} Hs</p>
											      				</div>
											      				<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: right;">
													        		<p>${{$precios[$indice]}}</p>
													        	</div>
											      				<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: right; padding-right:0px;">
											      					{!! Form::open(['url' => 'turno/reservar/previsualizar' , 'method' => 'post']) !!}
											      						{!!Form::hidden('id_establecimiento', $cancha->id_est)!!}
											      						{!!Form::hidden('id_cancha', $cancha->id_can)!!}
											      						{!!Form::hidden('horaInicio', $HI)!!}
											      						{!!Form::hidden('horaFin', $horaFin[$indice])!!}
											      						{!!Form::hidden('dia', $dia)!!}
											      						{!!Form::hidden('arrayHoraIni', $cancha->horaIni)!!}
											      						{!!Form::hidden('arrayHoraFin', $cancha->horaFin)!!}
											      						{!!Form::hidden('fecha', $fecha)!!}					
											      						{!! Form::submit('Ir', ['class' => 'btn btn-default boton']) !!}
																	{!! Form::close() !!}
											      				</div>
											      				<?php $indice++;?>
										      				</div>
										      			@endforeach
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
</div>


@endsection