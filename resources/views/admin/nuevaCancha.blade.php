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
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTituloAdmin">
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
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;Nueva cancha</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/cancha/nueva' , 'method' => 'post', 'files'=>true]) !!}
                            
                            <?php 
                                $deportes = DB::table('deporte')->get();
                                $arr = array();
                                foreach($deportes as $deporte)
                                {
                                    $arr[$deporte->id] = $deporte->deporte;
                                }
                    
                                $superficies = DB::table('superficie')->get();
                                $arr2 = array();
                                foreach($superficies as $superf)
                                {
                                    $arr2[$superf->id] = $superf->superficie;
                                }
                                
                                $arr3 = array('3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12');
                    
                                $establecimientos = DB::table('establecimiento')->where('id_usuario', Auth::user()->id)->get();
                                $arr4 = array();
                                foreach($establecimientos as $establecimiento)
                                {
                                    $arr4[$establecimiento->id] = $establecimiento->nombre;
                                }
                            ?>                    
                      <div class="form-group col-md-12">
                        <div class="col-md-6 ">
                            <label>Nombre del establecimiento</label>
                             {!! Form::select('id_establecimiento', $arr4 , null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6 ">
                            <label>Nombre de cancha</label>
                            {!!Form::text('nombre_cancha', null, ['class' => 'form-control', 'placeholder' => 'Nombre Cancha']) !!}
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-4 ">
                                <label>Cantidad de jugadores</label>
                                {!! Form::select('cant_jugadores', $arr3 , null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4">
                                <label>¿ Tiene iluminación ?</label>
                                {!! Form::select('tiene_luz', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4">
                                <label>¿ Es techada ?</label>
                                {!! Form::select('techada', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-6">
                                <label>Deportes</label>
                                {!! Form::select('id_deporte', $arr , null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <label>Tipo de superficie</label>
                                {!! Form::select('id_superficie', $arr2 , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Imagen 1</label>
                            {!!Form::file('imgCancha1',['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group col-md-12">
                            <label>Imagen 2</label>
                            {!!Form::file('imgCancha2',['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group col-md-12">
                            <label>Imagen 3</label>
                            {!!Form::file('imgCancha3',['class' => 'form-control'])!!}
                        </div>
                      <div style="text-align: center;">
                        <button class="btn2">Agregar</button>
                      </div>
                    {!! Form::close() !!}
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
