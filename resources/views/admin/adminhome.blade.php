@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="col-md-2 volver">
    <button class="btn2" onclick="go_back()">Volver&nbsp;
        <i class="fa fa-undo" aria-hidden="true"></i>
    </button>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
            <h2>Panel de administración</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               Administración central de tu cuenta&nbsp;&nbsp; <i class="fa fa-pencil"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
        </div>
    </div>
       <div class="row">
        <div class="col-md-6 bloque-exterior">
            <div class="bloque tipo-1" >
                <div class="col-md-10 update-left">
                    <h4>Establecimientos registrados</h4>
                </div>
                <div class="col-md-2 update-right">
                    <i class="fa fa-building"> </i>
                </div>
                <div class="row">
                    <div class="col-md-6 cont-btn">
                        <a href="{{ url('admin/establecimiento') }}" class="btn ">
                            Administrar
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                    <div class="col-md-6 cont-btn">
                        <a href="{{ url('admin/establecimiento/nuevo') }}" class="btn ">
                            Nuevo establecimiento
                            <i class="fa fa-plus-circle"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="clearfix"> 
                </div>
            </div>
        </div>
        <div class="col-md-6 bloque-exterior">
            <div class="bloque tipo-1">
                <div class="col-md-10 update-left">
                    <h4>Canchas registradas</h4>
                </div>
                <div class="col-md-2 update-right">
                    <i class="fa fa-home"> </i>
                </div>
                <div>
                    <div class="col-md-6 cont-btn">
                            <a href="{{ url('admin/cancha') }}" class="btn">
                                Administrar
                                <i class="fa fa-pencil"></i>
                            </a>
                    </div>
                    <div class="col-md-6 cont-btn">
                            <a href="{{ url('admin/cancha/nueva') }}" class="btn ">
                                Nueva cancha
                                <i class="fa fa-plus-circle"></i>
                            </a>
                    </div>
                </div>
                <div class="clearfix"> 
                </div>
            </div>
        </div>
        <div class="col-md-6 bloque-exterior">
            <div class="bloque tipo-1">
                <div class="col-md-10 update-left">
                    <h4>Turnos libres para el día de hoy</h4>
                </div>
                <div class="col-md-2 update-right">
                    <i class="fa fa-calendar"> </i>
                </div>
                <div>
                    <div class="col-md-6 cont-btn">
                        <a href="{{ url('admin/turnos') }}" class="btn">
                            Administrar
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                    <div class="col-md-6 cont-btn">
                            <a href="{{ url('admin/turno/nuevo') }}" class="btn">
                            Nuevo turno
                            <i class="fa fa-plus-circle"></i>
                            </a>
                    </div>
                </div>
                <div class="clearfix"> 
                </div>
            </div>
        </div>
        <div class="col-md-6 bloque-exterior">
            <div class="bloque tipo-1">
                <div class="col-md-10 update-left">
                    <h4>Datos personales</h4>
                </div>
                <div class="col-md-2 update-right">
                    <i class="fa fa-users"> </i>
                </div>
                <div>
                    <div class="col-md-6 cont-btn" style="float: right;">
                        <a href="{{ url('usuario/datos') }}" class="btn">
                            Ver mis datos personales
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                </div>
                <div class="clearfix"> 
                </div>
                
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection
