
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">



<div class="col-md-2" style="padding-top: 5%;">
    <button class="btn2" onclick="go_back()">Volver&nbsp;
        <i class="fa fa-undo" aria-hidden="true"></i>
    </button>
</div>
<div class="container" style="padding-top: 10%;">
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
            <h2>Administración de tus turnos</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               Administrá tus turnos&nbsp;&nbsp; <i class="fa fa-pencil"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
        </div>
    </div>   
    <div class="row" >
        <div class="col-md-12 col-sm-12 col-xs-12">
            <ol class="lista col-md-12 col-sm-12 col-xs-12">
                <?php $panel = 1 ?>
                 @foreach($turnosAdmin as $turnos_cancha)
                        <div class="establec col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0; padding-top:1%;padding-bottom:2%;">
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0;">
                                        <a class="nombreEstabl linkEstabl"> {{$turnos_cancha[0]->cancha->nombre_cancha}}</a>
                                    </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="float:right; ">
                                <div class="panel-group col-md-12 col-sm-12 col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id=<?php echo $panel?> style="padding-left:0px; background-color: #3b5998;">
                                          <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href=<?php echo "#collapse".$panel?> aria-expanded="false" aria-controls=<?php echo "collapse".$panel?>><span class="linkTurno">Ver turnos</span>
                                            <i class="fa fa-btn glyphicon glyphicon-chevron-down" style="float: right;"></i></a>
                                          </h4>
                                        </div>
                                        <div id=<?php echo "collapse".$panel?> class="panel-collapse collapse" role="tabpanel" aria-labelledby=<?php echo $panel?> style="background-color: #F3F3F3;">
                                           <table class="table table-striped" class="t-center">
                                               <thead>
                                                 <tr>
                                                   <th class="t-left">Día</th>
                                                   <th class="t-center">Hora inicio</th>
                                                   <th class="t-center">Hora fin</th>
                                                   <th class="t-right">Precio</th>
                                                   <th class="t-right">Precio adic luz</th>
                                                   <th class="t-center"><i class="fa fa-btn glyphicon glyphicon-share-alt"></i></th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                               @foreach($turnos_cancha as $turno)
                                                 <tr>
                                                   <td class="t-left">{{$turno->dia->dia}}</td>
                                                   <td class="t-center">{{$turno->horaInicio}}</td>
                                                   <td class="t-center">{{$turno->horaFin}}</td>
                                                   <td class="t-right">${{$turno->precio_cancha}}</td>
                                                   @if($turno->adic_luz == 1)
                                                       <td class="t-right">${{$turno->precio_adicional}}</td>
                                                   @else
                                                       <td class="t-center">-</td>
                                                   @endif
                                                   <td class="t-center">
                                                    {!! Form::open(['route' => ['admin.turno' , $turno->id], 'method' => 'GET'])!!}
                                                   <button class="btn2" style="width:100%;">Editar turno</button>
                                                   {!!Form::close()!!}
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
                @endforeach 
            </ol>
        </div>
    </div>
</div>

@endsection 