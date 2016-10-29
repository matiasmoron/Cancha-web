<link rel="stylesheet" href="{{ URL::asset('css/canchas/todas.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/commons/commons.css') }}">
<link rel="stylesheet" href="{{asset('css/font-awesome-4.6.3/css/font-awesome.min.css')}}" >

<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.js') }}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/canchas/canchas.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>

<header></header>

<div class="container">
    <div class="row">

    <!--                             Menu izquierdo y canchas                                 -->
    	{{-- <div class="col-md-9 col-md-offset-3">
    		<div class="col-md-12 col-sm-12 col-xs-12 tituloResult">
	    		<h3>Nuestras Canchaas Disponibles</h3>
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
    	</div> --}}

    	{{-- <div class="left-column">
    		<div class="col-md-12 t-center" style=" padding: 3% 0%;">
    			<a href="{{ url('/') }}">
    				<img src="{{ url('/fotos/img/canchaYa.png') }}" style="border-radius: 25%;">
    			</a>
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
		    		<div class="col-md-12 col-sm-12 col-xs-12">
		    			{!!Form::submit('Filtrar', ['class' => 'btn']) !!}
		    		</div>
		    	{!!Form::close()!!}
	    	</div>
    	</div> --}}

{{-- HASTA ACA --}}


    	{{-- <div class="col-md-9 col-sm-12 result noPadding"> --}}
        <div class="resultados">
            @if(!$estab->isEmpty()) 
                <ul class="listado col-md-12">
                    <?php $panel = 1 ?>
                    @foreach($estab as $nro_es =>$est)
                        
                        <li class="col-md-11 col-xs-12 establecimiento">
                            {{-- Foto establec --}}
                            <a class="col-md-4 col-xs-6" style="background-image: url('../img/prueba-turnos/2.jpg')"></a>
                            {{-- info_estab --}}
                            <div class="info_estab col-md-8 col-xs-6">
                                <h2><a  class="nombre_est">{{$est[0]->nombre}}</a></h2>
                                <span class="rating">
                                    <span class="puntaje">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                                    </span> 
                                    <span class="celu_ocu">20 opiniones</span>
                                </span>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;{{$est[0]->direccion}}</p>
                                <p><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;8 turnos disponibles!</p>
                            </div>
                            <label class="menor-precio" title="Menor precio para la fecha seleccionada!">
                                <b>Desde</b>
                                <b>$500</b>
                            </label>
                            <div class="ver_canchas">
                                <button class="btn" data-id="{{$nro_es}}" title="Ver canchas con turnos disponibles">
                                    <span class="celu_ocu">Ver turnos&nbsp;&nbsp;</span>
                                    <span class="celu">Ver&nbsp;&nbsp;</span>
                                    <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                </button>
                            </div>
                        </li>

                        <div class="canchas_estab" id={{"canchas_estab_".$nro_es}} hidden>
                            @foreach($est as $nro_ca=>$cancha)
                                <ul  class="col-md-12 col-xs-12 listado">
                                    <li class="col-md-7 col-xs-12 canchas">
                                        <a class="col-md-7 col-xs-6" style="background-image: url('../img/prueba-turnos/1.jpg')"></a>
                                        <div class="info_cancha col-md-5 col-xs-6">
                                            <h2><a class="nombre_est">{{$cancha->nombre_cancha}}</a></h2>
                                            <span class="rating">
                                               <span class="puntaje">
                                                   <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                                               </span> 
                                               <span class="celu_ocu">20 opiniones</span>
                                            </span>
                                            <div class="canchas_caract">
                                                <p>
                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                    &nbsp;&nbsp;{{$cancha->cant_jugadores}} <span>jugadores por equipo</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    &nbsp;&nbsp; Techada 
                                                </p>
                                                <p>
                                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                                    &nbsp;&nbsp; Tipo de suelo : {{$cancha->superficie}}
                                                </p>
                                            </div>
                                        </div> 
                                    </li>

                                    <li class="col-md-4 turnos_cancha" id={{"turnos_cancha".$nro_ca}} >
                                        <?php                                
                                            $hora_ini = explode(",", $cancha->horaIni);
                                            $hora_fin = explode(",", $cancha->horaFin);
                                            $precios = explode(",", $cancha->precios);
                                            $turnos = explode(",", $cancha->id_turnos);
                                            $indice = 0;   
                                        ?>
                                        <table class="tabla-turnos">
                                            <tbody class="table-hover">
                                            @foreach($hora_ini as $hi)
                                                <tr class="t-center">
                                                    <td class="t-center" title="">{{substr($hi,0,5)}} Hs</td>
                                                    <td class="t-center">${{$precios[$indice]}}</td>
                                                    <td class="t-center">
                                                        {!! Form::open(['url' => 'turno/reservar/previsualizar' , 'method' => 'post','class'=>'no_padding']) !!}
                                                            {!!Form::hidden('id_establecimiento', $cancha->id_est)!!}
                                                            {!!Form::hidden('id_cancha', $cancha->id_can)!!}
                                                            {!!Form::hidden('dia', $dia)!!}
                                                            {!!Form::hidden('fecha', $fecha)!!}
                                                            {!!Form::hidden('id_turnoAdmin', $turnos[$indice])!!}
                                                            {!!Form::submit('Reservar', ['class' => 't.center btn_reserva']) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                <?php $indice++;?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                            
                     @endforeach
                </ul>

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


