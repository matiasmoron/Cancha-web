<link rel="stylesheet" type="text/css" href={{ URL::asset('css/demo.css') }} />
<link rel="stylesheet" type="text/css" href={{ URL::asset('css/elastislide.css') }} />
<link rel="stylesheet" type="text/css" href={{ URL::asset('css/custom.css') }} />
<link rel="stylesheet" href="http://localhost/Cancha-web/public/css/canchas/todas.css">
<link rel="stylesheet" href="http://localhost/Cancha-web/public/css/bootstrap/bootstrap.css">
<link rel="stylesheet" href="http://localhost/Cancha-web/public/css/commons/commons.css">
<link rel="stylesheet" href="http://localhost/Cancha-web/public/css/turnos/turnos.scss">
  <link rel="stylesheet" href="http://localhost/Cancha-web/public/css/demo.css">
<link rel="stylesheet" href="http://localhost/Cancha-web/public/css/slippry.css" />
 <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">


<script type="text/javascript" src="http://localhost/Cancha-web/public/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="http://localhost/Cancha-web/public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://localhost/Cancha-web/public/js/canchas/canchas.js"></script>
<script type="text/javascript" src="http://localhost/Cancha-web/public/js/bootstrap.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRxC6Y4f-j6nECyHWigtBATtJyXyha-XU&libraries=adsense&sensor=true&language=es"></script>
 <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
</head>



<header></header>

<body>
	<div class="container">
    	<div class="row">
    		<div class="container">
    			<div class="row">
    			<!--                                  TITULO                                  -->

    				<div class="col-md-1 col-sm-1 col-xs-1">
    					<img class="mediana" src={{asset('/fotos/pelotaF.png')}}>
    				</div>
    	   			<div class="col-md-9 col-sm-9 col-xs-8">
    	 				<h2>{{$establecimiento->nombre}}</h2>
    				</div>
    				<div class="col-md-2 col-sm-2 col-xs-3">
						<h1>${{$turnoAdmin->precio_cancha}}</h1>
					</div>
    				<div class="col-md-9 col-sm-9 col-xs-9">
    					<i class="fa fa-btn glyphicon glyphicon-tag color-blue"></i>{{$establecimiento->direccion}}, {{$establecimiento->ciudad->ciudad_nombre}} - {{$establecimiento->ciudad->provincia->provincia_nombre}}
    					<br/>
    					<i class="fa fa-btn glyphicon glyphicon-flag color-blue"></i>{{sizeof($establecimiento->canchas)}} Canchas
    				</div>
    				<div class="col-md-12 col-sm-12 ">
    					<hr width="100%">
    				</div>	
    			</div>
   		 	</div> 
   		 	<!--                                 Carousel                                      -->
			<div class="col-md-12 col-sm-12 ">
				<div class="col-md-8 col-sm-8">
					<section class="demo_wrapper">
						<article class="demo_block">
							<ul id="demo1">
  								<li>
    								<a  href="#slide1"><img src="http://localhost/Cancha-web/public/img/prueba-turnos/1.jpg"></a>
  								</li>
  								<li>
    								<a href="#slide2"><img src="http://localhost/Cancha-web/public/img/prueba-turnos/2.jpg"></a>
  								</li>
  								<li>
    								<a href="#slide3"><img src="http://localhost/Cancha-web/public/img/prueba-turnos/header.jpg"></a>
  								</li>
							</ul>
						</article>
					</section>
				</div>
				<!-- 						INFO turno 											-->          
				<div class="col-md-4 col-sm-4">
					<div class="col-md-1 col-sm-1">
						<i class="fa fa-btn glyphicon glyphicon-time color-blue" style="font-size: 25px;"></i> 
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 contInfo">
						<p><strong>Día:</strong> {{$turnoAdmin->dia->dia}} {{date('d/m/Y', strtotime($fecha))}}</p>
						<p><strong>Horario de Inicio:</strong> {{substr($turnoAdmin->horaInicio,0,5)}} Hs</p>
						<p><strong>Horario de Finalización:</strong> {{substr($turnoAdmin->horaFin,0,5)}} Hs</p>
						<p><strong>Duración del Turno:</strong> {{intval(substr($turnoAdmin->horaFin,0,2)) - intval(substr($turnoAdmin->horaInicio,0,2))}} Hora/s</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="col-md-1 col-sm-1  contIcon postContInfo">
						<img src={{asset('/fotos/icono-cancha.png')}}> 
					</div>
					<div class="col-md-12 col-sm-12  col-xs-12 contInfo postContInfo">
						<p><strong>Deporte:</strong> {{$cancha->deporte->deporte}}</p>
						<p><strong>Numero de Jugadores:</strong> {{$cancha->cant_jugadores}} por Equipo</p>
						<p><strong>Superficie:</strong> {{$cancha->superficie->superficie}}</p>
							@if($establecimiento->tienevestuario == 0)
								<p><strong>Vestuarios:</strong> No</p>
							@else
								<p><strong>Vestuarios:</strong> Si</p>
							@endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="col-md-1 col-sm-1  contIcon postContInfo">
						<i class="fa fa-btn glyphicon glyphicon-usd color-blue" style="font-size: 25px;"></i> 
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 col-xs-12 contInfo postCont2Info">
						@if($turnoAdmin->adic_luz == 1)
							<p style="color:red"><strong>Adicional Luz:</strong> Si</p>
							<p style="color:red"><strong>Precio Adicional:</strong> ${{$turnoAdmin->precio_adicional}}</p>
						@else
							<p style="color:green"><strong>Adicional Luz:</strong> No</p>
						@endif
							<p><strong>Metodo de Pago:</strong> Efectivo - Tarjeta de Credito</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					@if($turnoUser)
						<div class="col-md-6 col-sm-6 col-xs-6 postContBoton">
	      					{!! Form::open(['url' => 'turno/reservar' , 'method' => 'post','id'=>'form_confirmar']) !!}
	      					{!!Form::hidden('id_turnoAdmin', $turnoAdmin->id)!!}
	      					{!!Form::hidden('fecha', $fecha)!!}			
	      					
							{!! Form::close() !!}
							{!!Form::submit('Reservar Turno', ['class' => 'btn btn-default boton btn-reserva confirmar', 'data-id' => "form_confirmar", 'style' => 'float:right;'])!!}
						</div>
					@endif
				</div>
			</div>
		</div>
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
    	<!-- 
    								UBICACION 							-->
    	<div class="container">
    		<div class="row">
		 		<div class="col-md-12 col-sm-12 col-xs-12 centrarSubTitulo">
    				<h3>Ubicación de {{$establecimiento->nombre}}</h3>
    				<div class="col-md-4 col-sm-4 col-xs-4 ">
    					<hr width="100%">
    				</div>	
    				<div class="col-md-4 col-sm-4 col-xs-4 subtitulo">
    					<i class="fa fa-btn glyphicon glyphicon-globe color-blue"></i>Conocé mejor hacia donde vas a ir.
    				</div>
					<div class="col-md-4 col-sm-4 col-xs-4 ">
    					<hr width="100%">
    				</div>	
    			</div>
    			<div class="col-md-12 col-sm-12">
	    			<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="col-md-10 col-sm-10">
							<p><strong>Ciudad:</strong> {{$establecimiento->ciudad->ciudad_nombre}}</p>
							<p><strong>Provincia:</strong> {{$establecimiento->ciudad->provincia->provincia_nombre}}</p>
							<p id=address><strong>Dirección:</strong> {{$establecimiento->direccion}}</p>
						</div>
						<div class="col-md-10 col-sm-10">
						<p><strong>Nombre Dueño:</strong> {{$establecimiento->usuario->name}}</p>
						<p><strong>Usuario:</strong> {{$establecimiento->usuario->email}}</p>
						</div>
	    			</div>
			    	<div class="col-md-6 col-sm-6 col-xs-6">
			  			<div id="map_canvas" style= " height: 50%; width:100%"></div>
    				</div>
    					<div class="col-md-12 col-sm-12 col-xs-12">
    					<hr width="100%">
    					</div>	
				</div>
    		</div>
    	</div>

	
		
		<!--carousel-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="http://localhost/Cancha-web/public/js/slippry.min.js"></script>
		<script type="text/javascript">
		
			$(function() {
				var demo1 = $("#demo1").slippry({
					// transition: 'fade',
					// useCSS: true,
					// speed: 1000,
					// pause: 3000,
					// auto: true,
					// preload: 'visible',
					// autoHover: false
				});

				
				$('.init').click(function () {
					demo1 = $("#demo1").slippry();
					return false;
				});
			});

		
			$(document).ready(function() {
    load_map();
});
 
var map;
 
function load_map() {
    var myLatlng = new google.maps.LatLng(20.68009, -101.35403);
    var myOptions = {
        zoom: 4,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($("#map_canvas").get(0), myOptions);

    // Obtenemos la dirección y la asignamos a una variable
    var address = '{{$establecimiento->direccion}},{{$establecimiento->ciudad->ciudad_nombre}}';
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
};
 
function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {
        // Si hay resultados encontrados, centramos y repintamos el mapa
        // esto para eliminar cualquier pin antes puesto
        var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
        var markerOptions = { position: results[0].geometry.location }
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
    } else {
        // En caso de no haber resultados o que haya ocurrido un error
        // lanzamos un mensaje con el error
        alert("Geocoding no tuvo éxito debido a: " + status);
    }
}

$(".confirmar").on('click',function(e){
      console.log("pasa");
      var id = $(this).data('id');
      e.preventDefault();
      swal({   
          title: "¿Estas seguro de realizar la reserva?",   
          text: "¡Recuerda que podras cancelarla!",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",  
          confirmButtonText: "Si, realizar reserva",   
          cancelButtonText: "¡No, Cancelar!",   
          closeOnConfirm: false,   
          closeOnCancel: false },
       function(isConfirm){
          if (isConfirm) {
            $("#"+id).submit();   
          } 
          else {     
            swal("Cancelado", "Tu reserva no se ha realizado", "error");   
          } 
      });
  });


 
		</script>
		
		
	</body>
</html>