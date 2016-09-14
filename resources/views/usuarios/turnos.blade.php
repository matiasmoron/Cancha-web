@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--                                  TURNOS ALTERNATIVOS                                  -->

        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
            <h3>Tu Lista de Turnos</h3>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
                <i class="fa fa-btn glyphicon glyphicon-calendar color-blue"></i>¡Que no te quedes con ningún partido sin jugar!
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr>
            </div>
        </div>

        <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1" style="padding-top: 3%;">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="t-center">Cancha</th>
                    <th class="t-center">Dia</th>
                    <th class="t-center">Fecha</th>
                    <th class="t-center">Hora de Inicio</th>
                    <th class="t-center">Hora de Fin</th>
                    <th class="t-center"><i class="fa fa-btn glyphicon glyphicon-share-alt encabTabla"></i></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($turnosUser as $TU)
                        <?php   $horaIni = explode(",", $TU->horaIni);
                                $horaFin = explode(",", $TU->horaFin);
                                $turnos = explode(",", $TU->id_turnos);
                                $indice = 0; ?>
                        @foreach($horaIni as $HI)
                            <tr>
                                <td class="t-center">{{$TU->nombreCancha}}</td>
                                <td class="t-center">{{$TU->dia}}</td>
                                <td class="t-center">{{date('d/m/Y', strtotime($TU->fecha))}}</td>
                                <td class="t-center">{{substr($HI,0,5)}} Hs</td>
                                <td class="t-center">{{substr($horaFin[$indice],0,5)}} Hs</td>
                                <td class="t-center col-md-3 col-sm-12 col-xs-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        {!! Form::open(['url' => 'turno/reservar/previsualizar' , 'method' => 'post']) !!}
                                            {!!Form::hidden('id_establecimiento', $TU->id_estab)!!}
                                            {!!Form::hidden('id_cancha', $TU->id_canc)!!}
                                            {!!Form::hidden('horaInicio', $HI)!!}
                                            {!!Form::hidden('horaFin', $horaFin[$indice])!!}
                                            {!!Form::hidden('dia', $TU->dia_ingles)!!}
                                            {!!Form::hidden('fecha', $TU->fecha)!!}
                                            {!!Form::hidden('id_turnoAdmin', $turnos[$indice])!!}
                                            {!!Form::hidden('flag', 1)!!}
                                            {!!Form::submit('Ir', ['class' => 'btn btn-default boton btn-reserva']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        {!! Form::open(['url' => 'turno/eliminar' , 'method' => 'DELETE']) !!}
                                            {!!Form::hidden('id_turnoUser', $TU->id_turnoUser)!!}
                                            {!!Form::submit('Dar Baja', ['class' => 'btn btn-default boton btn-reserva']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                                <?php $indice++; ?>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection