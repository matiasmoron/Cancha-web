@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--                                  TURNOS ALTERNATIVOS                                  -->

        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo" style="padding-top: 5%;">
            <h3>Tu Lista de Turnos</h3>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
                <i class="fa fa-btn glyphicon glyphicon-calendar"></i>¡Que no te quedes con ningún partido sin jugar!
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:5%;"> 
            <div class="col-md-12 col-sm-12 col-xs-12 TurnosAdic">
                <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 1%;">
                    <div class="col-md-3 col-sm-3 col-xs 3" style="text-align: center;">
                        <p>Dia</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs 4" style="text-align: center;">
                        <p>Horario de Inicio</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs 4" style="text-align: center;">
                        <p>Horario de Finalización</p>
                    </div>
                </div>
                @foreach($turnosUser as $TU) 
                    <?php   $horaIni = explode(",", $TU->horaIni);
                            $horaFin = explode(",", $TU->horaFin);
                            $indice = 0; ?>      
                    @foreach($horaIni as $HI)
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 1%;">
                            <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: center;">
                                <p>{{$TU->dia}}</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
                                <p>{{substr($HI,0,5)}} Hs</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs 4" style="text-align: center;">
                                <p>{{substr($horaFin[$indice],0,5)}} Hs</p>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-1" style="text-align: right;">
                                <i class="fa fa-btn glyphicon glyphicon-share-alt"></i>
                            </div>
                        </div>
                    <?php $indice++; ?>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection