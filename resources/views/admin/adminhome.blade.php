@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel-group col-md-10 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
        <div class="panel">

            <div class="panel-heading color-heading">
                <h4 class="panel-title title-head"><i class="fa fa-btn glyphicon glyphicon-home"></i>
                    Establecimientos
                </h4>
            </div>
            <div class="panel-body padding-body">
                <ol class="listaLink">
                    <li>
                        <div class="summary-navigation-number" style="background-color : black;">
                            <p>0</p>
                        </div>
                        <p>Establecimientos Registrados</p>
                    </li>
                    <li>
                        <h3>Accciones</h3>
                    </li>
                    <li>
                        <ol class="listaLink">
                            <li>
                                <a href="{{ url('admin/establecimiento') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-pencil"></i>Administrar Establecimiento</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/establecimiento/nuevo') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-plus"></i>Nuevo Establecimiento</a>
                            </li>
                        </ol>
                    </li>
                </ol> 
            </div>
            
            <div class="panel-heading color-heading">
                <h4 class="panel-title title-head"><link rel="icon" type="image/png" href={{asset('/fotos/cancha-icon.png')}} />
                    Canchas
                </h4>
            </div>
            <div class="panel-body padding-body">
                <ol class="listaLink">
                    <li>
                        <div class="summary-navigation-number" style="background-color : black;">
                            <p>0</p>
                        </div>
                        <p>Canchas Registrados</p>
                    </li>
                    <li>
                        <h3>Accciones</h3>
                    </li>
                    <li>
                        <ol class="listaLink">
                            <li><a href="{{ url('admin/cancha') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-pencil"></i>Administrar Canchas</a></li>
                            <li><a href="{{ url('admin/cancha/nueva') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-plus"></i>Nueva Cancha</a></li>
                        </ol>
                    </li>
                </ol>
            </div>
            
            <div class="panel-heading color-heading">
                <h4 class="panel-title title-head"><i class="fa fa-btn glyphicon glyphicon-calendar"></i>
                    Turnos
                </h4>
            </div>
            <div class="panel-body padding-body">
                <ol class="listaLink">
                    <li>
                        <h3>Accciones</h3>
                    </li>
                    <li>
                        <ol class="listaLink">
                            <li><a href="{{ url('admin/turnos') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-pencil"></i>Administrar Turnos</a></li>
                            <li><a href="{{ url('admin/turno/nuevo') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-plus"></i>Nuevo Turno</a></li>
                        </ol>
                    </li>
                </ol>
            </div>
            
            <div class="panel-heading color-heading">
                <h4 class="panel-title title-head"><i class="fa fa-btn glyphicon glyphicon-info-sign"></i>
                    Datos Personales
                </h4>
            </div>
            <div class="panel-body padding-body">
                <ol class="listaLink">
                    <li>
                        <h3>Accciones</h3>
                    </li>
                    <li>
                        <ol class="listaLink">
                            <li><a href="{{ url('admin/datos') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-user"></i>Ver Mis Datos Personales</a></li>
                            <li><a href="{{ url('admin/datos/modificar') }}" class="link"><i class="fa fa-btn glyphicon glyphicon-pencil"></i>Modificar Datos Personales</a></li>
                        </ol>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
