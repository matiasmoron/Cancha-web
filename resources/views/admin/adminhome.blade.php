@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">Establecimiento</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    <li><a href="{{ url('admin/establecimiento') }}"><i class="fa fa-btn glyphicon glyphicon-home"></i>Administrar Establecimiento</a></li>
                    <li><a href="{{ url('admin/establecimiento/nuevo') }}"><i class="fa fa-btn glyphicon glyphicon-plus"></i>Nuevo Establecimiento</a></li> 
                </div>
            </div>
            
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse2">Canchas</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                   <li><a href="{{ url('admin/cancha') }}"><i class="fa fa-btn glyphicon glyphicon-home"></i>Administrar Canchas</a></li>
                    <li><a href="{{ url('admin/cancha/nueva') }}"><i class="fa fa-btn glyphicon glyphicon-plus"></i>Nueva Cancha</a></li> 
                </div>
            </div>
            
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse3">Turnos</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                   <li><a href="{{ url('admin/turnos') }}"><i class="fa fa-btn glyphicon glyphicon-home"></i>Administrar Turnos</a></li>
                    <li><a href="{{ url('admin/turno/nuevo') }}"><i class="fa fa-btn glyphicon glyphicon-plus"></i>Nuevo Turno</a></li> 
                </div>
            </div>
            
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse4">Datos Personales</a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                   <li><a href="{{ url('admin/datos') }}"><i class="fa fa-btn glyphicon glyphicon-home"></i>Ver Mis Datos Personales</a></li>
                    <li><a href="{{ url('admin/datos/modificar') }}"><i class="fa fa-btn glyphicon glyphicon-plus"></i>Modificar Datos Personales</a></li> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
