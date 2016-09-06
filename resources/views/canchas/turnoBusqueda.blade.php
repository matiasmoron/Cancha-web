@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/canchas/todas.css') }}">

<div class="container">
    <div class="row">

    <!--                               TITULO                             -->

    	<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
    		<h3>Nuestras Canchas Disponibles</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<div class="col-md-3 col-sm-3 col-xs-3">
					<hr width="100%">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<i class="fa fa-btn glyphicon glyphicon-calendar color-blue"></i>¡Estas son las canchas que tenemos disponible para el {{date('d/m/Y', strtotime($fecha))}}!
				</div>
    			<div class="col-md-3 col-sm-3 col-xs-3">
					<hr width="100%">
				</div>
    	</div>


    <!--                               BUSCADOR                             -->

    	<div class="col-md-12 col-sm-12 col-xs-12 acomodar buscadorTop">
    		<div class="col-md-9 col-sm-9 col-xs-9">
	        	{!! Form::select('id_rank', $rank , '0' , ['class' => 'form-control', 'style' => 'width:25%; float:right;']) !!}
	        </div>
    		<div class="col-md-3 col-sm-3 col-xs-3">
    			{!!Form::open(['url' => 'turnos/todos', 'method' => 'GET', 'class' => 'navbar-form', 'style' => 'margin:0', 'role' => 'search'])!!}
			        <div class="input-group" style="float:right;">
			        	{!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Establecimiento'])!!}
			        	{!!Form::hidden('fecha_turno', $fecha)!!}
			            <div class="input-group-btn">
			                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div>
			        </div>
	        	{!!Form::close()!!}
	        </div>
    	</div>

    <!--                               CANCHAS Y MENU                             -->

    	<div class="col-md-12 col-sm-12 col-xs-12">
	    	<div class="col-md-2 col-sm-2 col-xs-2 menuIzq no-margin">
	    		<div class="col-md-12 col-sm-12 col-xs-12">
	    			<h4 class="texto_menuIzq">Filtrar Por:</h4>
	    		</div>
	    		{!!Form::open(['url' => 'turnos/todos', 'method' => 'GET'])!!}
	    			<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				<p class="texto_menuIzq">Deporte</p>
		    			</div>
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				{!! Form::select('id_deporte', $deportes , '0' , ['class' => 'form-control']) !!}
		    			</div>
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				<p class="texto_menuIzq">Ciudad</p>
		    			</div>
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				{!! Form::select('id_ciudad', $ciudad , '0' , ['class' => 'form-control']) !!}
		    			</div>
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				<p class="texto_menuIzq">Superficie</p>
		    			</div>
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				{!! Form::select('id_superficie', $superficie , '0' , ['class' => 'form-control']) !!}
		    			</div>
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				<p class="texto_menuIzq">Jugadores</p>
		    			</div>
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				{!! Form::select('cantJugadores', $jugadores , '0' , ['class' => 'form-control']) !!}
		    			</div>
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				<p class="texto_menuIzq">Fecha</p>
		    			</div>
		    			<div class="col-md-12 col-sm-12 col-xs-12">
		    				{!! Form::date('fecha_turno', $fecha, ['class' => 'form-control']) !!}
		    			</div>
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12">
		    			{!!Form::submit('Filtrar', ['class' => 'btn btn-default boton btn-reserva']) !!}
		    		</div>
		    	{!!Form::close()!!}
	    	</div>
	    	@if(!$estab->isEmpty())
		        <div class="col-md-10 col-sm-10 col-xs-10" style="margin:0;">
					<ol class="lista col-md-12 col-sm-12 col-xs-12">
						<?php $panel = 1 ?>
						@foreach($estab as $est)
							<div class="establec col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0; padding-top:1%;">
									<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0;">
										<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0;">
											<a class="nombreEstabl linkEstabl">{{$est[0]->nombre}}</a>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
											
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:right;">
										<i class="fa fa-btn fa-map-marker fa-lg"></i><span class="info1">{{$est[0]->direccion}}</span>
									</div>
								</div>

								@foreach($est as $cancha)
								<div class="col-md-12 col-sm-12 col-xs-12" style="float:right; ">
									<li class="recuadro">
										<div class="cont container">
											<div class="col-md-2 col-sm-2 col-xs-2">
												<a href="/">
													<img class="foto" src={{asset('/fotos/futbol.jpg')}}>
												</a>
											</div>
											<div class="TurnoData col-md-10 col-sm-10 col-xs-10">
												<div class="datosFila1 col-md-12 col-sm-12 col-xs-12" style="text-align:center; padding:2%;">
													<div class="col-md-4 col-sm-4 col-xs-4">
														<p class="nombreCancha">
															<img src={{asset('/fotos/icon-cancha2.png')}}>
															{{$cancha->nombre_cancha}}
														</p>
													</div>
													<div class="col-md-4 col-sm-4 col-xs-4">
														<i class="fa fa-btn glyphicon glyphicon-user"></i><span class="info1">{{$cancha->cant_jugadores}} Jugadores por Equipo</span>
													</div>
													<div class="col-md-4 col-sm-4 col-xs-4">
														<i class="fa fa-btn glyphicon glyphicon-leaf"></i><span class="info1">{{$cancha->superficie}}</span>
													</div>
												</div>
												<div class="panel-group col-md-12 col-sm-12 col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
													<div class="panel">
						    							<div class="panel-heading" role="tab" id=<?php echo $panel?> style="padding-left:0px; background-color: #3b5998;">
													      <h4 class="panel-title">
													        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href=<?php echo "#collapse".$panel?> aria-expanded="false" aria-controls=<?php echo "collapse".$panel?>><span class="linkTurno">Ver Turnos</span>
													        <i class="fa fa-btn glyphicon glyphicon-chevron-down" style="float: right; color:white;"></i></a>
													      </h4>
													    </div>
													    <div id=<?php echo "collapse".$panel?> class="panel-collapse collapse" role="tabpanel" aria-labelledby=<?php echo $panel?> style="background-color: #F3F3F3;">
														    <div class="panel-body">
														    	<div class="col-md-12 col-sm-12 col-xs-12">
														        	<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
														        		<p>Desde</p>
														        	</div>
														        	<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
														        		<p>Hasta</p>
														        	</div>
														        	<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center;">
														        		<p>Precio</p>
														        	</div>
														        	<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: right;">
														        		<i class="fa fa-btn glyphicon glyphicon-share-alt"></i>
														        	</div>
														        </div>
														        <hr width="90%">
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
															      						{!!Form::hidden('arrayPrecios', $cancha->precios)!!}
															      						{!!Form::submit('Ir', ['class' => 'btn btn-default boton btn-reserva']) !!}
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
								</div>
								<?php $panel++?>
								@endforeach
							</div>
						@endforeach
					</ol>
				</div>
			@else
				<div class="col-md-10 col-sm-10 col-xs-10">
					<div class="col-md-12 col-sm-12 col-xs-12 cont_empty">
						<h3 class="text-cente texto_menuIzq">¡No se han encontrado canchas disponibles en base a sus opciones! :(</h3>
						<h4 class="text-cente texto_menuIzq">Por favor reintentá cambiando tus preferencias.</h4>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>


@endsection