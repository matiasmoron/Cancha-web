<link rel="stylesheet" href="{{ URL::asset('css/canchas/todas.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/commons/commons.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>


<div class="container">
    <div class="row">

    <!--                             Menu izquierdo y canchas                                 -->
    	<div class="top-bar col-md-9">
    		<div class="col-md-12 col-sm-12 col-xs-12 tituloResult">
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
    	</div>

    	<div class="col-md-3 left-column" style="overflow-y: scroll;">
    		<div class="col-md-12" style="text-align: center; padding: 3% 0%;">
    			<a href="{{ url('/') }}">
    				<img src="{{ url('/fotos/img/canchaYa.png') }}" style="border-radius: 25%;">
    			</a>
    		</div>
    		<div class="col-md-12" >
    			<nav class="navbar" style="margin:0; padding: 0;">
    			    <div class="row" >
    			        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="text-align: center;">
    			             <ul class="nav">
    			                <!-- Authentication Links -->
    			                @if (Auth::guest())
    			                    <li><a href="{{ url('/login') }}">Ingresar</a></li>
    			                @else
    			                    <li class="dropdown">
    			                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    			                           Hola  {{ Auth::user()->name }} <span class="caret"></span>
    			                        </a>
    			                        <ul class="dropdown-menu nav col-md-12" role="menu">
    			                            <li><a href="{{ url('usuarios/turnos') }}"><i class="fa fa-btn glyphicon glyphicon-calendar"></i>Mis Turnos</a></li>
    			                            @if( Auth::user()->admin == 1)
    			                                <li><a href="{{ url('admin/home') }}">
    			                                <i class="fa fa-btn glyphicon glyphicon-th-list">
    			                                </i>Administrar</a></li>
    			                            @else
    			                                <li><a href="{{ url('usuario/datos') }}"><i class="fa fa-btn fa-user"></i>Mi cuenta</a></li>
    			                            @endif
    			                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
    			                        </ul>
    			                    </li>
    			                @endif
    			            </ul>
    			        </div>
    			    </div>
    			</nav>
    		</div>
    		<div class="col-md-12" style="margin: 0; padding: 0;">
	    		{!!Form::open(['url' => 'turnos/todos', 'method' => 'GET'])!!}
	    			<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
	    				<span class="texto_menuIzq">Deporte</span>
	    				{!! Form::select('id_deporte', $deportes , '0' , ['class' => 'form-control']) !!}
	    			</div>

		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<span class="texto_menuIzq">Ciudad</span>
		    			{!! Form::select('id_ciudad', $ciudad , '0' , ['class' => 'form-control']) !!}
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<span class="texto_menuIzq">Superficie</span>
		    			{!! Form::select('id_superficie', $superficie , '0' , ['class' => 'form-control']) !!}
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
		    			<span class="texto_menuIzq">Jugadores</span>
		    			{!! Form::select('cantJugadores', $jugadores , '0' , ['class' => 'form-control']) !!}
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-menu">
						<span class="texto_menuIzq">Fecha</span>
		    			{!! Form::date('fecha_turno', $fecha, ['class' => 'form-control']) !!}
		    		</div>
		    		<div class="col-md-12 col-sm-12 col-xs-12 elem-boton">
		    			{!!Form::submit('Filtrar', ['class' => 'btn btn-default boton btn-reserva']) !!}
		    		</div>
		    	{!!Form::close()!!}
	    	</div>
    	</div>
    	<div class="col-md-9 result noPadding">
    		@if(!$estab->isEmpty())
		        <div class="col-md-12 col-sm-9 col-xs-9 noPadding">
					<ol class="lista col-md-12 col-sm-12 col-xs-12">
						<?php $panel = 1 ?>
						@foreach($estab as $est)
							<div class="establec col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0;">
										<a class="nombreEstabl linkEstabl">{{$est[0]->nombre}}</a>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="text-align:right;">
										<i class="fa fa-btn fa-map-marker fa-lg"></i><span class="info1">{{$est[0]->direccion}}</span>
									</div>									
								</div>

								@foreach($est as $cancha)
								<div class="col-md-12 col-sm-12 col-xs-12" style="float:right; ">
									<li class="recuadro">
										<div class="cont col-md-12 noPadding">
											<div class="col-md-4 col-sm-2 col-xs-2 noPadding">
												<a href="/">
													<img class="foto" src={{asset('/fotos/futbol.jpg')}}>
												</a>
											</div>
											<div class="TurnoData col-md-8 col-sm-10 col-xs-10 noPadding">
												<div class="datosFila1 col-md-12 col-sm-12 col-xs-12" style="text-align:center; padding:2%;">
													<div class="col-md-12 col-sm-4 col-xs-4">
														<p class="nombreCancha" style="font-size: 22px;">
															{{$cancha->nombre_cancha}}
														</p>
													</div>
													<div class="col-md-6 col-sm-4 col-xs-4">
														<i class="fa fa-btn glyphicon glyphicon-user"></i><span class="info1">{{$cancha->cant_jugadores}} Jugadores por Equipo</span>
													</div>
													<div class="col-md-6 col-sm-4 col-xs-4">
														<i class="fa fa-btn glyphicon glyphicon-leaf"></i><span class="info1">{{$cancha->superficie}}</span>
													</div>
												</div>
												<div class="panel-group col-md-12 col-sm-12 col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
													<div class="panel">
						    							<div class="panel-heading" role="tab" id={{$panel}} style="padding-left:0px; background-color: #3b5998;">
													      <h4 class="panel-title">
													        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href={{"#collapse".$panel}} aria-expanded="false" aria-controls={{"collapse".$panel}}><span class="linkTurno">Turnos</span>
													        <i class="fa fa-btn glyphicon glyphicon-chevron-down" style="float: right; color:white;"></i></a>
													      </h4>
													    </div>
													    <div id={{"collapse".$panel}} class="panel-collapse collapse" role="tabpanel" aria-labelledby={{$panel}} style="background-color: #F3F3F3;">
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
														    			$turnos = explode(",", $cancha->id_turnos);
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
															      						{!!Form::hidden('dia', $dia)!!}
															      						{!!Form::hidden('fecha', $fecha)!!}
															      						{!!Form::hidden('id_turnoAdmin', $turnos[$indice])!!}
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
				<div class="col-md-12 col-sm-10 col-xs-10">
					<div class="col-md-12 col-sm-12 col-xs-12 cont_empty">
						<h3 class="text-cente texto_menuIzq">¡No se han encontrado canchas disponibles en base a sus opciones! :(</h3>
						<h4 class="text-cente texto_menuIzq">Por favor reintentá cambiando tus preferencias.</h4>
					</div>
				</div>
			@endif
    	</div>

	</div>   
</div>


