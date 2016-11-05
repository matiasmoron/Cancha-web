@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/turnos/turnos.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/turnos/turnos.js') }}"></script>

<div class="container">
    <div class="row">
    	
    	<!--                                  TITULO                                  -->

    	<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
    		<h2>{{$establecimiento->nombre}}</h2>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
    		<div class="col-md-4 col-sm-4 col-xs-4">
    			<hr width="100%">
    		</div>
    		
    		<div class="col-md-2 col-sm-2 col-xs-2" style="text-align:right;">
    			<i class="fa fa-btn glyphicon glyphicon-tag color-blue"></i>{{$establecimiento->ciudad->ciudad_nombre}}
    		</div>
    		<div class="col-md-2 col-sm-2 col-xs-2" style="text-align:left;">
    			<i class="fa fa-btn glyphicon glyphicon-flag color-blue"></i>{{sizeof($establecimiento->canchas)}} Canchas
    		</div>
    		<div class="col-md-4 col-sm-4 col-xs-4">
    			<hr width="100%">
    		</div>
    	</div>


    	<!--                                  INFO TURNO                                  -->

    	<div class="col-md-12 col-sm-12 col-xs-12">

    	<!--                                  SLIDER                                  -->
    		<div id="carousel-example-generic" class="col-md-7 col-sm-7 col-xs-7 carousel slide" data-ride="carousel">
			  <!-- Indicators 
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			  </ol>-->

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img src={{asset("/img/".preg_replace('[\s+]','', $establecimiento->nombre)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."1.jpg")}} alt={{$cancha->nombre_cancha}}>
				      <div class="carousel-caption">
				        
				      </div>
				    </div>
				    
				    @if(file_exists($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".preg_replace('[\s+]','', $establecimiento->nombre)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."2.jpg"))
					    <div class="item">
						    <img src={{asset("/img/".preg_replace('[\s+]','', $establecimiento->nombre)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."2.jpg")}} alt={{$cancha->nombre_cancha}}>
						    <div class="carousel-caption"></div>
					    </div>
				    @endif

				    @if(file_exists($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".preg_replace('[\s+]','', $establecimiento->nombre)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."3.jpg"))
					    <div class="item">
						    <img src={{asset("/img/".preg_replace('[\s+]','', $establecimiento->nombre)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."/".preg_replace('[\s+]','',$cancha->nombre_cancha)."3.jpg")}} alt={{$cancha->nombre_cancha}}>
						    <div class="carousel-caption"></div>
					    </div>
				    @endif
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left color-blue" aria-hidden="true"></span>
			    
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right color-blue" aria-hidden="true"></span>
			    <span class="sr-only">Siguiente</span>
			  </a>
			</div>

			<div class="col-md-5 col-sm-5 col-xs-5">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h1>${{$turnoAdmin->precio_cancha}}</h1>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="col-md-2 col-sm-2 col-xs-2">
								<i class="fa fa-facebook-square" aria-hidden="true" style="font-size:25px; color:#3b5998"></i>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
								<i class="fa fa-twitter" aria-hidden="true" style="font-size:25px; color:#4099FF"></i>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
								
							</div>
						</div>
					</div>
					
					<div class="col-md-2 col-sm-2 col-xs-2 contIcon">
						<i class="fa fa-btn glyphicon glyphicon-time color-blue" style="font-size: 25px;"></i> 
					</div>
					<div class="col-md-10 col-sm-1 col-xs-10 contInfo">
						<p><strong>Día:</strong> {{$turnoAdmin->dia->dia}} {{date('d/m/Y', strtotime($fecha))}}</p>
						<p><strong>Horario de Inicio:</strong> {{substr($turnoAdmin->horaInicio,0,5)}} Hs</p>
						<p><strong>Horario de Finalización:</strong> {{substr($turnoAdmin->horaFin,0,5)}} Hs</p>
						<p><strong>Duración del Turno:</strong> {{intval(substr($turnoAdmin->horaFin,0,2)) - intval(substr($turnoAdmin->horaInicio,0,2))}} Hora/s</p>
					</div>

					<div class="col-md-2 col-sm-2 col-xs-2 contIcon postContInfo">
						<img src={{asset('/fotos/icono-cancha.png')}}> 
					</div>
					<div class="col-md-10 col-sm-1 col-xs-10 contInfo postContInfo">
						<p><strong>Deporte:</strong> {{$cancha->deporte->deporte}}</p>
						<p><strong>Numero de Jugadores:</strong> {{$cancha->cant_jugadores}} por Equipo</p>
						<p><strong>Superficie:</strong> {{$cancha->superficie->superficie}}</p>
						@if($establecimiento->tienevestuario == 0)
							<p><strong>Vestuarios:</strong> No</p>
						@else
							<p><strong>Vestuarios:</strong> Si</p>
						@endif
					</div>

					<div class="col-md-2 col-sm-2 col-xs-2 contIcon postContInfo">
						<i class="fa fa-btn glyphicon glyphicon-usd color-blue" style="font-size: 25px;"></i> 
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10 contInfo postCont2Info">
						@if($turnoAdmin->adic_luz == 1)
							<p style="color:red"><strong>Adicional Luz:</strong> Si</p>
							<p style="color:red"><strong>Precio Adicional:</strong> ${{$turnoAdmin->precio_adicional}}</p>
						@else
							<p style="color:green"><strong>Adicional Luz:</strong> No</p>
						@endif
						<p><strong>Metodo de Pago:</strong> Efectivo - Tarjeta de Credito</p>
					</div>
					@if($turnoUser)
						<div class="col-md-10 col-sm-10 col-xs-10 postContBoton">
	      					{!! Form::open(['url' => 'turno/reservar' , 'method' => 'post']) !!}
	      						{!!Form::hidden('id_turnoAdmin', $turnoAdmin->id)!!}
	      						{!!Form::hidden('fecha', $fecha)!!}			
	      						{!!Form::submit('Reservar Turno', ['class' => 'btn btn-default boton btn-reserva', 'style' => 'float:right;'])!!}
							{!! Form::close() !!}
						</div>
					@endif
				</div>
			</div>

    	</div>

    	<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 2%;">
    		<hr>
    	</div>

    	<!--                                  TURNOS ALTERNATIVOS                                  -->

    	@if(!is_null($turnosAlter[0]->horaIni))
			<div class="col-md-12 col-sm-12 col-xs-12 centrarSubTitulo">
	    		<h3>Turnos Alternativos</h3>
	    	</div>
	    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
	    			<i class="fa fa-btn glyphicon glyphicon-calendar color-blue"></i>¡Tenemos muchos mas turnos para ofrecerte!
	    	</div>

	    	<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1" style="padding-top: 3%;">
	    		<table class="table table-striped">
				    <thead>
				      <tr>
				        <th class="t-center">Hora de Inicio</th>
				        <th class="t-center">Hora de Fin</th>
				        <th class="t-center">Precio</th>
				        <th class="t-center"><i class="fa fa-btn glyphicon glyphicon-share-alt encabTabla"></i></th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php 	$horaIni = explode(",", $turnosAlter[0]->horaIni);
								$horaFin = explode(",", $turnosAlter[0]->horaFin);
								$precios = explode(",", $turnosAlter[0]->precios);
								$turnos = explode(",", $turnosAlter[0]->id_turnos);
				        		$indice = 0; ?>
				        @foreach($horaIni as $HI)
				        	<tr>
					        	@if(strcmp(substr($HI,0,8), $turnoAdmin->horaInicio) !== 0)
							        <td class="t-center">{{substr($HI,0,5)}} Hs</td>
							        <td class="t-center">{{substr($horaFin[$indice],0,5)}} Hs</td>
							        <td class="t-center">${{$precios[$indice]}}</td>
							        <td class="t-center">	
							        	{!! Form::open(['url' => 'turno/reservar/previsualizar' , 'method' => 'post']) !!}
				      						{!!Form::hidden('id_establecimiento', $establecimiento->id)!!}
				      						{!!Form::hidden('id_cancha', $cancha->id)!!}
				      						{!!Form::hidden('id_turnoAdmin', $turnos[$indice])!!}
				      						{!!Form::hidden('dia', $dia)!!}
				      						{!!Form::hidden('fecha', $fecha)!!}
				      						{!!Form::submit('Ir', ['class' => 'btn btn-default boton btn-reserva']) !!}
										{!! Form::close() !!}
							        </td>
							    @endif
								<?php $indice++; ?>
							</tr>
				        @endforeach
				    </tbody>
				</table>
	    	</div>

	    	<div class="col-md-12 col-sm-12 col-xs-12">
	    		<hr>
	    	</div>
    	@endif

	    <!--                                  UBICACION                                  -->

	    <div class="col-md-12 col-sm-12 col-xs-12 centrarSubTitulo">
    		<h3>Ubicación de {{$establecimiento->nombre}}</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<i class="fa fa-btn glyphicon glyphicon-globe color-blue"></i>Conocé mejor hacia donde vas a ir.
    	</div>

    	<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo" style="position: relative; left:-70px;">
	    	<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="col-md-10 col-sm-10 col-xs-10 contInfoDer" style="position: relative; top:60px;">
					<p><strong>Ciudad:</strong> {{$establecimiento->ciudad->ciudad_nombre}}</p>
					<p><strong>Provincia:</strong> {{$establecimiento->ciudad->provincia->provincia_nombre}}</p>
					<p><strong>Dirección:</strong> {{$establecimiento->direccion}}</p>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2 contIcon" style="padding-top: 3%; padding-left:10%; position: relative; top:60px;">
					<i class="fa fa-btn glyphicon glyphicon-pushpin color-blue" style="font-size: 25px;"></i> 
				</div>
				<div class="col-md-10 col-sm-10 col-xs-10 contInfoDer" style="position: relative; top:70px;">
					<p><strong>Nombre Dueño:</strong> {{$establecimiento->usuario->name}}</p>
					<p><strong>Usuario:</strong> {{$establecimiento->usuario->email}}</p>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2 contIcon" style="padding-top: 3%; padding-left:10%; position: relative; top:70px;">
					<i class="fa fa-btn glyphicon glyphicon-user color-blue" style="font-size: 25px;"></i> 
				</div>
	    	</div>

	    	<div class="col-md-6 col-sm-6 col-xs-6">
			    <iframe src={{"https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d12451.760119559092!2d".$coord[1]."!3d".$coord[0]."!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1468334101841"}} width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
    		<hr>
    	</div>


		<!--                                  OTRAS CANCHAS                                  -->

		<div class="col-md-12 col-sm-12 col-xs-12 centrarSubTitulo">
    		<h3>Otras Canchas en {{$establecimiento->nombre}}</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<i class="fa fa-btn glyphicon glyphicon-thumbs-up color-blue"></i>¡Porque las canchas son lo que nos sobra!
    	</div>

    	<div class="col-md-12 col-sm-12 col-xs-12" style="padding:2%;">
    		<div class="carousel slide multi-item-carousel" id="theCarousel">
	            <div class="carousel-inner">
	            <?php $indice = 0;?>
		    		@foreach($establecUser as $EU)
		    			@foreach($EU->canchas as $C)
		    				@if($C->id !== $cancha->id)
			    				@if($indice === 0)
				    				<div class="item active">
			    						<div class="col-md-4 col-sm-4 col-xs-4">
			    							<a href={{url("/")}} class="linkCancha">
					    					<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">
					    						<img src={{asset('/fotos/futbol.jpg')}} class="foto" width="100" height="100">
					    					</div>
					    					<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 2%;">
					    						<p style="text-align: center;"><strong>{{$C->nombre_cancha}}</strong></p>
					    						<p style="text-align: center;"><i class="fa fa-btn glyphicon glyphicon-user color-blue"></i>{{$C->cant_jugadores}} jugadores por equipo</p>
					    						<p style="text-align: center;"><i class="fa fa-btn glyphicon glyphicon-leaf color-blue"></i>{{$C->superficie->superficie}}</p>
					    					</div>
					    					</a>
						    			</div>
				    				</div>
					    			@else
					    				<div class="item">
							    			<div class="col-md-4 col-sm-4 col-xs-4">
							    				<a href="/" class="linkCancha">
						    					<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">
						    						<img src={{asset('/fotos/futbol.jpg')}} class="foto" width="100" height="100">
						    					</div>
						    					<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 2%;">
						    						<p style="text-align: center;"><strong>{{$C->nombre_cancha}}</strong></p>
						    						<p style="text-align: center;"><i class="fa fa-btn glyphicon glyphicon-user color-blue"></i>{{$C->cant_jugadores}} jugadores por equipo</p>
						    						<p style="text-align: center;"><i class="fa fa-btn glyphicon glyphicon-leaf color-blue"></i>{{$C->superficie->superficie}}</p>
						    					</div>
						    					</a>
							    			</div>
						    			</div>
				    				@endif
				    			<?php $indice++;?>
				    		@endif
			    		@endforeach	
		    		@endforeach
	            </div>
	            <a class="left carousel-control" href="#theCarousel" role="button" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left color-blue" aria-hidden="true"></span>
		    	</a>
				<a class="right carousel-control" href="#theCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right color-blue" aria-hidden="true"></span>
				    <span class="sr-only">Siguiente</span>
				</a>
          	</div>
    	</div>

	</div>
</div>


@endsection