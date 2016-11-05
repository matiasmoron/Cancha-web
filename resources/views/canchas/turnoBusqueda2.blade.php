<link rel="stylesheet" href="{{ URL::asset('css/canchas/todas.css') }}">
{{-- <link rel="stylesheet" href="{{ URL::asset('css/canchas/filtrado.css') }}"> --}}
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/commons/commons.css') }}">
<link rel="stylesheet" href="{{asset('css/font-awesome-4.6.3/css/font-awesome.min.css')}}" >


<script type="text/javascript">
    var establec = <?php echo json_encode($estab); ?>;
</script>

<header>
    <div class="oscurecer">
        <div class="logo">
            Cancha<strong>YA</strong>
        </div>
        <div class="col-md-12 col-md-offset-3 col-xs-12 titulo-disponibles">
            <h1 class="t_libres celu_ocu"></h1><h2 class="celu_ocu">&nbsp;turnos disponibles para el día {{date('d/m/Y', strtotime($fecha))}}!</h2>
            <h3 class="t_libres celu"></h3><h4 class="celu">&nbsp;turnos disponibles para el día {{date('d/m/Y', strtotime($fecha))}}!</h4>
        </div>
    </div>
</header>

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

        <div id='icono_filtros' class="celu" title="Hacé click para ver el filtrado!">
            <button class="btn abrir-filtro">
                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
            </button>
        </div>
    	<div  class="left-column cerrar">
            <div class="filter-close celu">
                <button class="btn"> 
                    <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                </button>
                <button class="btn btn-cerrar" title="Hacé click para cerrar el filtrado!">Cerrar</button>
            </div>
    		<div class="col-md-12 t-center celu_ocu">
                <div id="myCarousel" class="carousel slide">
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="{{ url('img/prueba-turnos/1.jpg') }}" style="width:100%" class="img-responsive">
                    </div>
                    <div class="item">
                      <img src="{{ url('img/prueba-turnos/2.jpg') }}" class="img-responsive">
                    </div>
                    <div class="item">
                      <img src="{{ url('img/prueba-turnos/inicio.jpg') }}" class="img-responsive">
                    </div>
                  </div>
                </div>
    		</div>
            <div id="filtros">
                <div class="cd-filter-block col-md-12">
                    <h4><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Buscar</h4>
                    <div>
                        <input type="search" id="busqueda" onkeyup="busqueda()" placeholder="Qué estás esperando?...">
                    </div>
                </div>
                <div id="superficie" class="cd-filter-block col-md-12">
                    <h4><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Superficie</h4>
                    <div class="checkbox">
                      <label><input type="checkbox" value="s1">Sintético</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="s2">Tierra</label>
                    </div>
                     <div class="checkbox">
                      <label><input type="checkbox" value="s3">Piso flotante</label>
                    </div>
                </div>

                {{-- Solo visible el filtrado si el deporte es fútbol --}}
                <div id="cant_jugadores" class="cd-filter-block col-md-12">
                    <h4><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Tamaño</h4>
                    <div class="checkbox">
                      <label><input type="checkbox" value="c5">Fútbol 5</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="c7">Fútbol 7</label>
                    </div>
                     <div class="checkbox">
                      <label><input type="checkbox" value="c9">Fútbol 9</label>
                    </div>
                </div>
                <div id="caract" class="cd-filter-block col-md-12">
                    <h4><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Características</h4>
                    <div class="checkbox">
                      <label><input type="checkbox" value="t1">Techada</label>
                    </div>
                    {{-- <div class="checkbox">
                      <label><input type="checkbox" value="l1">Iluminación</label>
                    </div> --}}
                </div>
            </div>
    		{{-- <div class="col-md-12" style="margin: 0; padding: 0;">
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
	    	</div> --}}

    	</div>
        {{-- FIN FILTROS --}}


            {{-- Listado de establecimientos --}}
            <div class="resultados ">
                @if(!$estab->isEmpty()) 
                    <ul class="listado col-md-12">
                        <?php $panel = 1 ?>
                        @foreach($estab as $nro_es =>$est)
                            
                            <li id={{"estab_".$nro_es}} class="col-md-11 col-xs-12 establecimiento" data-nombre={{$est[0]->nombre}}>
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
                                    <p ><i class="fa fa-check " aria-hidden="true"></i>&nbsp;&nbsp;<b class="t-disp"></b>&nbsp;turnos disponibles!</p>
                                </div>
                                <div>
                                    <label class="menor-precio" title="Menor precio para la fecha seleccionada!">
                                        <b class="b1">Desde</b>
                                        <b class="b2"></b>
                                    </label>
                                </div>
                                <div class="ver_canchas">
                                    <button class="btn" data-id="{{$nro_es}}" title="Ver canchas con turnos disponibles">
                                        <span class="celu_ocu">Ver turnos&nbsp;&nbsp;</span>
                                        <span class="celu">Turnos&nbsp;&nbsp;</span>
                                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </li>

                            <div  id={{"canchas_estab_".$nro_es}} class="canchas_estab" data-estab={{$nro_es}} hidden>
                                @foreach($est as $nro_ca=>$cancha)
                                    <ul  class="col-md-12 col-xs-12 listado">
                                        <div id={{"cancha_".$nro_es."_".$nro_ca}} class="cancha-turno {{"s".$cancha->id_superficie}} {{"t".$cancha->techada}} {{"c".$cancha->cant_jugadores}}">
                                            <li class="col-md-7 col-xs-12 canchas">
                                                <a class="col-md-6 col-xs-6" style="background-image: url('../img/prueba-turnos/1.jpg')"></a>
                                                <div class="info_cancha col-md-6 col-xs-6">
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
                                                            @if($cancha->techada)
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                            @endif
                                                            &nbsp;&nbsp; Techada 
                                                        </p>
                                                        <p>
                                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                                            &nbsp;&nbsp; {{$cancha->superficie}}
                                                        </p>
                                                    </div>
                                                </div> 
                                            </li>

                                            <li class="col-md-4 turnos_cancha">
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
                                        </div>
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

            {{-- Filtrado --}}
            {{-- <div class="cd-filter">
                    <form>
                        <div class="cd-filter-block">
                            <h4>Buscar</h4>

                            <div class="cd-filter-content">
                                <input type="search" placeholder="Qué estás esperando?...">
                            </div>
                            <!-- cd-filter-content -->
                        </div>
                        <!-- cd-filter-block -->

                        <div class="cd-filter-block">
                            <h4>Superficie</h4>

                            <ul class="cd-filter-content cd-filters list">
                                <li>
                                    <input class="filter" data-filter=".check1" type="checkbox" id="check_1">
                                    <label class="checkbox-label" for="checkbox1">Sintético</label>
                                </li>

                                <li>
                                    <input class="filter" data-filter=".check2" type="checkbox" id="check_2">
                                    <label class="checkbox-label" for="checkbox2">Césped</label>
                                </li>

                                <li>
                                    <input class="filter" data-filter=".check3" type="checkbox" id="check_3">
                                    <label class="checkbox-label" for="checkbox3">Parquet</label>
                                </li>
                            </ul>
                            <!-- cd-filter-content -->
                        </div>
                        <!-- cd-filter-block -->

                        <div class="cd-filter-block">
                            <h4>Cantidad de jugadores</h4>

                            <ul class="cd-filter-content cd-filters list">
                                <li>
                                    <input class="filter" data-filter=".check4" type="checkbox" id="check_4">
                                    <label class="checkbox-label" for="checkbox4">Futbol 5</label>
                                </li>

                                <li>
                                    <input class="filter" data-filter=".check5" type="checkbox" id="check_5">
                                    <label class="checkbox-label" for="checkbox5">Fútbol 7</label>
                                </li>

                                <li>
                                    <input class="filter" data-filter=".check6" type="checkbox" id="check_6">
                                    <label class="checkbox-label" for="checkbox6">Fútbol 9</label>
                                </li>
                            </ul>
                            <!-- cd-filter-content -->
                        </div>
                        <!-- cd-filter-block -->

                        <div class="cd-filter-block">
                            <h4>Características</h4>

                            <ul class="cd-filter-content cd-filters list">
                                <li>
                                    <input class="filter" data-filter=".check7" type="checkbox" id="check_7">
                                    <label class="checkbox-label" for="checkbox4">Techada</label>
                                </li>

                                <li>
                                    <input class="filter" data-filter=".check8" type="checkbox" id="check_8">
                                    <label class="checkbox-label" for="checkbox5">Iluminación</label>
                                </li>

                                <li>
                                    <input class="filter" data-filter=".check9" type="checkbox" id="check_9">
                                    <label class="checkbox-label" for="checkbox6">Vestuarios</label>
                                </li>
                            </ul>
                            <!-- cd-filter-content -->
                        </div>
                        <!-- cd-filter-block -->

                    </form>

                    <a href="#0" class="cd-close">Cerrar</a>
            </div> --}}
            <!-- cd-filter -->

            {{-- <a href="#0" class="cd-filter-trigger">Filtros</a> --}}
	</div>   
</div>


<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.js') }}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/canchas/canchas.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
{{-- <script type="text/javascript" src="{{ URL::asset('js/canchas/filtrado.js') }}"></script> --}}
