@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	
    	<!--                                  TITULO                                  -->

    	<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
    		<h3>{{$establecimiento->nombre}}</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<i class="fa fa-btn glyphicon glyphicon-tag"></i>{{$establecimiento->ciudad->ciudad_nombre}}
    			<i class="fa fa-btn glyphicon glyphicon-flag"></i> 3 Canchas
    	</div>

    	<!--                                  INFO TURNO                                  -->

    	<div class="col-md-12 col-sm-12 col-xs-12 posCont1">

    	<!--                                  SLIDER                                  -->

    		<div id="carousel-example-generic" class="col-md-6 col-sm-6 col-xs-6 carousel slide posContSlide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src={{asset('/fotos/futbol.jpg')}} alt="">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    
			    <div class="item">
			      <img src={{asset('/fotos/futbol.jpg')}} alt="">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Siguiente</span>
			  </a>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="col-md-16 col-sm-16 col-xs-16">
					<div class="col-md-16 col-sm-16 col-xs-16">
						<h3>${{$turnoAdmin->precio_cancha}}</h3>
					</div>
					
					<div class="col-md-2 col-sm-2 col-xs-2 contIcon">
						<i class="fa fa-btn glyphicon glyphicon-time" style="font-size: 25px;"></i> 
					</div>
					<div class="col-md-10 col-sm-1 col-xs-10 contInfo">
						<p>Día: {{$turnoAdmin->dia->dia}} {{date('d/m/Y', strtotime($fecha))}}</p>
						<p>Horario de Inicio: {{substr($turnoAdmin->horaInicio,0,5)}} Hs</p>
						<p>Horario de Finalización: {{substr($turnoAdmin->horaFin,0,5)}} Hs</p>
						<p>Duración del Turno: 2 Horas.</p>
					</div>

					<div class="col-md-2 col-sm-2 col-xs-2 contIcon postContInfo">
						<img src={{asset('/fotos/icono-cancha.png')}}> 
					</div>
					<div class="col-md-10 col-sm-1 col-xs-10 contInfo postContInfo">
						<p>Deporte: {{$cancha->deporte->deporte}}</p>
						<p>Numero de Jugadores: {{$cancha->cant_jugadores}} por Equipo</p>
						<p>Superficie: {{$cancha->superficie->superficie}}</p>
						@if($establecimiento->tienevestuario == 0)
							<p>Vestuarios: No</p>
						@else
							<p>Vestuarios: Si</p>
						@endif
					</div>

					<div class="col-md-2 col-sm-2 col-xs-2 contIcon postContInfo">
						<i class="fa fa-btn glyphicon glyphicon-usd" style="font-size: 25px;"></i> 
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10 contInfo postCont2Info">
						@if($turnoAdmin->adic_luz == 1)
							<p>Adicional Luz: Si</p>
							<p>Precio Adicional: ${{$turnoAdmin->precio_adicional}}</p>
						@else
							<p>Adicional Luz: No</p>
						@endif
						<p>Metodo de Pago: Efectivo - Tarjeta de Credito</p>
					</div>

					<div class="col-md-10 col-sm-10 col-xs-10 postContBoton">
      					{!! Form::open(['url' => 'turno/reservar' , 'method' => 'post']) !!}
      						{!!Form::hidden('id_turnoAdmin', $turnoAdmin->id)!!}
      						{!!Form::hidden('fecha', $fecha)!!}			
      						{!!Form::submit('Reservar Turno', ['class' => 'btn btn-default boton'])!!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>

    	</div>

    	<!--                                  TURNOS ALTERNATIVOS                                  -->

		<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo" style="padding-top: 5%;">
    		<h3>Turnos Alternativos</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<i class="fa fa-btn glyphicon glyphicon-calendar"></i>¡Tenemos muchos mas turnos para ofrecerte!
    	</div>

    	<div class="col-md-12 col-sm-12 col-xs-12" style="padding:5%;"> 
	        <div class="col-md-10 col-sm-10 col-xs-10 TurnosAdic col-md-offset-1">
	        	<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 1%;">
		        	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
		        		<p>Horario de Inicio</p>
		        	</div>
		        	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
		        		<p>Horario de Finalización</p>
		        	</div>
		        	<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: right;">
		        		<i class="fa fa-btn glyphicon glyphicon-share-alt"></i>
		        	</div>
		        </div>
		        <?php 	$horaIni = explode(",", $arrayHoraIni);
						$horaFin = explode(",", $arrayHoraFin);
		        		$indice = 0; ?>
		        @foreach($horaIni as $HI)
		        	@if(strcmp(substr($HI,0,8), $turnoAdmin->horaInicio) !== 0)
				        <div class="col-md-16 col-sm-16 col-xs-16" style="padding: 1%;">
				        	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
				        		<p>{{substr($HI,0,5)}} Hs</p>
				        	</div>
				        	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
				        		<p>{{substr($horaFin[$indice],0,5)}} Hs</p>
				        	</div>
				        	<div class="col-md-2 col-sm-2 col-xs-2" style="text-align: right;">
				        		<i class="fa fa-btn glyphicon glyphicon-share-alt"></i>
				        	</div>
				        </div>
				    @endif
				<?php $indice++; ?>
		        @endforeach
	        </div>
	    </div>

	    <!--                                  UBICACION                                  -->

	    <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo" style="padding-top: 5%;">
    		<h3>Ubicación de {{$establecimiento->nombre}}</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<i class="fa fa-btn glyphicon glyphicon-globe"></i>Conocé mejor hacia donde vas a ir.
    	</div>

    	<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo" style="padding-top: 4%; position: relative; left:-70px;">
	    	<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="col-md-10 col-sm-10 col-xs-10 contInfoDer" style="position: relative; top:60px;">
					<p>Ciudad: {{$establecimiento->ciudad->ciudad_nombre}}</p>
					<p>Provincia: {{$establecimiento->ciudad->provincia->provincia_nombre}}</p>
					<p>Dirección: {{$establecimiento->direccion}}</p>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2 contIcon" style="padding-top: 3%; padding-left:10%; position: relative; top:60px;">
					<i class="fa fa-btn glyphicon glyphicon-pushpin" style="font-size: 25px;"></i> 
				</div>
				<div class="col-md-10 col-sm-10 col-xs-10 contInfoDer" style="position: relative; top:70px;">
					<p>Nombre Dueño: {{$establecimiento->usuario->name}}</p>
					<p>Usuario: {{$establecimiento->usuario->email}}</p>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2 contIcon" style="padding-top: 3%; padding-left:10%; position: relative; top:70px;">
					<i class="fa fa-btn glyphicon glyphicon-user" style="font-size: 25px;"></i> 
				</div>
	    	</div>

	    	<div class="col-md-6 col-sm-6 col-xs-6">
			    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d12451.760119559092!2d-62.265823533312975!3d-38.71918581685748!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1468334101841" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>

		<!--                                  OTRAS CANCHAS                                  -->
		<div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo" style="padding-top: 5%;">
    		<h3>Otras Canchas en {{$establecimiento->nombre}}</h3>
    	</div>
    	<div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
    			<i class="fa fa-btn glyphicon glyphicon-thumbs-up"></i>¡Porque las canchas son lo que nos sobra!
    	</div>

    	<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:5%;">
    		<ol class="listaCanchas">
    		@foreach($establecUser as $EU)
    			@foreach($EU->canchas as $C)
	    			<li>
	    				<div class="col-md-4 col-sm-4 col-xs-4">
	    					<div class="col-md-10 col-sm-10 col-xs-10" style="text-align:center">
	    						<img src={{asset('/fotos/futbol.jpg')}} width="100" height="100">
	    					</div>
	    					<div class="col-md-10 col-sm-10 col-xs-10" style="padding-top: 2%;">
	    						<p style="text-align: center;">{{$C->nombre_cancha}}</p>
	    						<p style="text-align: center;">{{$C->cant_jugadores}} jugadores por equipo</p>
	    						<p style="text-align: center;">Superficie de {{$C->superficie->superficie}}</p>
	    					</div>
	    				</div>	
	    			</li>
	    		@endforeach	
    		@endforeach
    		</ol>
    	</div>

	</div>
</div>


@endsection