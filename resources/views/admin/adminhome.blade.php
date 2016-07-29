@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">
<div class="container" style="padding-top: 5%;">
    <div>
        <div class="col-md-6 bloque-exterior">
            <div class="bloque tipo-1">
                <div class="col-md-10 update-left">
                    <h3>83</h3>
                    <h4>Establecimientos registrados</h4>
                </div>
                <div class="col-md-2 update-right">
                    <i class="fa fa-building"> </i>
                </div>
                <div >
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                            <a href="{{ url('admin/establecimiento') }}" class="link">
                                Administrar
                                <i class="fa fa-pencil"></i>
                            </a>
                        </button>   
                    </div>
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                            <a href="{{ url('admin/establecimiento/nuevo') }}" class="link">
                                Nuevo establecimiento
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </button>   
                    </div>
                </div>
                <div class="clearfix"> 
                </div>
            </div>
        </div>
        <div class="col-md-6 bloque-exterior" >
            <div class="bloque tipo-1">
                <div class="col-md-8 update-left">
                    <h3>83</h3>
                    <h4>Canchas registradas</h4>
                </div>
                <div class="col-md-4 update-right">
                    <i class="fa fa-home"> </i>
                </div>
                <div>
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                            <a href="{{ url('admin/cancha') }}" class="link">
                                Administrar
                                <i class="fa fa-pencil"></i>
                            </a>
                        </button>   
                    </div>
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                            <a href="{{ url('admin/cancha/nueva') }}" class="link">
                                Nueva cancha
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </button>   
                    </div>
                </div>
                <div class="clearfix"> 
                </div>
            </div>
        </div>
        <div class="col-md-6 bloque-exterior">
            <div class="bloque tipo-1">
                <div class="col-md-8 update-left">
                    <h3>3</h3>
                    <h4>Turnos libres para el día de hoy</h4>
                </div>
                <div class="col-md-4 update-right">
                    <i class="fa fa-calendar"> </i>
                </div>
                <div>
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                        <a href="{{ url('admin/turnos') }}" class="link">
                            Administrar
                            <i class="fa fa-pencil"></i>
                        </a>
                        </button>   
                    </div>
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                            <a href="{{ url('admin/turno/nuevo') }}" class="link">
                            Nuevo turno
                            <i class="fa fa-plus-circle"></i>
                            </a>
                        </button>   
                    </div>
                </div>
                <div class="clearfix"> 
                </div>
            </div>
        </div>
        <div class="col-md-6 bloque-exterior">
            <div class="bloque tipo-1">
                <div class="col-md-8 update-left">
                    <h3>-</h3>
                    <h4>Datos personales</h4>
                </div>
                <div class="col-md-4 update-right">
                    <i class="fa fa-users"> </i>
                </div>
                <div>
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                        <a href="{{ url('admin/datos') }}" class="link">
                            Ver mis datos personales
                            <i class="fa fa-pencil"></i>
                        </a>
                        </button>   
                    </div>
                    <div class="col-md-6 cont-btn">
                        <button class="btn">
                            <a href="{{ url('admin/datos/modificar') }}" class="link">
                            Modificar datos personales
                            <i class="fa fa-plus-circle"></i>
                            </a>
                        </button>   
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
