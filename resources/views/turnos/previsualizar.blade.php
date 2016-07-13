@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-16 col-sm-16 col-xs-16 acomodar-submenu">
    		<ul class="nav nav-pills" role="tablist">
			  <li role="presentation" class="active"><a href="#turno" aria-controls="turno" role="tab" data-toggle="pill">Turno</a></li>
			  <li role="presentation"><a href="#establ" aria-controls="establ" role="tab" data-toggle="pill">Establecimiento</a></li>
			  <li role="presentation"><a href="#cancha" aria-controls="cancha" role="tab" data-toggle="pill">Cancha</a></li>
			</ul>
    	</div>
    	<div class="tab-content">
    		<div role="tabpanel" class="tab-pane active" id="turno">
		        <div class="col-md-8 col-sm-8 col-xs-8">
		        	<h3>Información del turno a reservar</h3>
		        </div>

		        <div class="col-md-4 col-sm-4 col-xs-4 TurnosAdic">
		        	<div class="col-md-16 col-sm-16 col-xs-16">
		        		<h3 class="TurnosAlterTitulo">Turnos Alternativos</h3>
		        	</div>
		        	<div class="col-md-16 col-sm-16 col-xs-16" style="padding: 1%;">
			        	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
			        		<p>Hora de Inicio</p>
			        	</div>
			        	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
			        		<p>Hora de Fin</p>
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
					        		<p>{{substr($HI,0,8)}}</p>
					        	</div>
					        	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
					        		<p>{{substr($horaFin[$indice],0,8)}}</p>
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
		    <div role="tabpanel" class="tab-pane" id="establ">
		    	<div class="col-md-16 col-sm-16 col-xs-16">
		        	<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d12451.760119559092!2d-62.265823533312975!3d-38.71918581685748!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1468334101841" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
		        </div>
		        <div class="acomodar col-md-10 col-sm-10 col-xs-10" style="color:black">

		        </div>
		        <div class="acomodar col-md-6 col-sm-6 col-xs-6" style="color:green">

		        </div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="cancha">
		    
		    </div>
		</div>
	</div>
</div>


@endsection