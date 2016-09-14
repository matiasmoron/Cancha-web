@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="col-md-2 volver" >
    <button class="btn2" onclick="go_back()">Volver&nbsp;
        <i class="fa fa-undo" aria-hidden="true"></i>
    </button>
</div>
<div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
            <h2>Administración de tus canchas</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               Administrá tus canchas&nbsp;&nbsp; <i class="fa fa-pencil"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <ol class="lista col-md-12 col-sm-12 col-xs-12">
                <?php $panel = 1 ?>
                @foreach($establecimientos as $establecimiento)
                    @if(sizeof($establecimiento->canchas) >0)
                        <div class="establec col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0; padding-top:1%;padding-bottom:2%;">
                                <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0;">
                                    <a class="nombreEstabl linkEstabl"> {{$establecimiento->nombre}}</a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="float:right; ">
                                <div class="panel-group col-md-12 col-sm-12 col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id=<?php echo $panel?> style="padding-left:0px; background-color: #3b5998;">
                                          <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href=<?php echo "#collapse".$panel?> aria-expanded="false" aria-controls=<?php echo "collapse".$panel?>><span class="linkTurno">Ver canchas</span>
                                            <i class="fa fa-btn glyphicon glyphicon-chevron-down" style="float: right;"></i></a>
                                          </h4>
                                        </div>
                                        <div id=<?php echo "collapse".$panel?> class="panel-collapse collapse" role="tabpanel" aria-labelledby=<?php echo $panel?> style="background-color: #F3F3F3;">
                                           <table class="table table-striped" class="t-center">
                                               <thead>
                                                 <tr>
                                                   <th class="t-left">Nombre/Nro</th>
                                                   <th class="t-center">Cant.Jugadores</th>
                                                   <th class="t-center">Tiene luz</th>
                                                   <th class="t-center">Techada</th>
                                                   <th class="t-center">Deporte</th>
                                                   <th class="t-center">Superficie</th>
                                                   <th class="t-center"><i class="fa fa-btn glyphicon glyphicon-share-alt"></i></th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                               @foreach($establecimiento->canchas as $cancha)
                                                 <tr>
                                                   <td class="t-left">{{$cancha->nombre_cancha}}</td>
                                                   <td class="t-center">{{$cancha->cant_jugadores}}</td>
                                                   @if($cancha->tiene_luz == 1)
                                                       <td class="t-center">Si</td>
                                                   @else
                                                       <td class="t-center">No</td>
                                                   @endif
                                                   @if($cancha->techada == 1)
                                                       <td class="t-center">Si</td>
                                                   @else
                                                       <td class="t-center">No</td>
                                                   @endif
                                                   <td class="t-center">{{$cancha->deporte->deporte}}</td>
                                                   <td class="t-center">{{$cancha->superficie->superficie}}</td>
                                                   <td class="t-center col-md-3 col-sm-12 col-xs-12">
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                      {!! Form::open(['route' => ['admin.cancha.editar' , $cancha->id], 'method' => 'GET'])!!}
                                                        <button class="btn2" style="width:100%;">Editar</button>
                                                      {!!Form::close()!!}
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                      {!! Form::open(['route' => ['admin.cancha.eliminar'], 'method' => 'DELETE'])!!}
                                                        <button class="btn2" style="width:100%;">Eliminar</button>
                                                        {!!Form::hidden('id_cancha', $cancha->id)!!}
                                                      {!!Form::close()!!}
                                                    </div>

                                                   </td>
                                                 </tr>
                                                @endforeach
                                               </tbody>
                                             </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $panel++?>
                        </div>
                    @endif
                @endforeach 
            </ol>
        </div>
    </div>
</div>

@endsection
