@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--                                  TURNOS ALTERNATIVOS                                  -->


        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
            <h3>Tu Lista de Turnos</h3>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo">
                <i class="fa fa-btn glyphicon glyphicon-calendar color-blue"></i>¡Que no te quedes con ningún partido sin jugar!
        </div>

        <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1" style="padding-top: 3%;">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="t-center">Dia</th>
                    <th class="t-center">Hora de Inicio</th>
                    <th class="t-center">Hora de Fin</th>
                    <th class="t-center"><i class="fa fa-btn glyphicon glyphicon-share-alt encabTabla"></i></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($turnosUser as $TU)
                        
                            <?php   $horaIni = explode(",", $TU->horaIni);
                                    $horaFin = explode(",", $TU->horaFin);
                                    $indice = 0; ?>
                            @foreach($horaIni as $HI)
                             <tr>
                                <td class="t-center" style="vertical-align:middle;">{{$TU->dia}}</td>
                                <td class="t-center" style="vertical-align:middle;">{{substr($HI,0,5)}} Hs</td>
                                <td class="t-center" style="vertical-align:middle;">{{substr($horaFin[$indice],0,5)}} Hs</td>
                                <td class="t-center"> 
                                    {!! Form::open(['url' => 'turno/reservar/previsualizar' , 'method' => 'post']) !!}
                                        {{--{!!Form::hidden('id_establecimiento', $establecimiento->id)!!}
                                        {!!Form::hidden('id_cancha', $cancha->id)!!}
                                        {!!Form::hidden('horaInicio', $HI)!!}
                                        {!!Form::hidden('horaFin', $horaFin[$indice])!!}
                                        {!!Form::hidden('dia', $dia)!!}
                                        {!!Form::hidden('arrayHoraIni', $arrayHoraIni)!!}
                                        {!!Form::hidden('arrayHoraFin', $arrayHoraFin)!!}
                                        {!!Form::hidden('fecha', $fecha)!!}
                                        {!!Form::hidden('arrayPrecios', $arrayPrecios)!!}--}}
                                        {!!Form::submit('Ir', ['class' => 'btn btn-default boton btn-turno']) !!}
                                    {!! Form::close() !!}
                                </td>
                            <?php $indice++; ?>
                            </tr>
                            @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>


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