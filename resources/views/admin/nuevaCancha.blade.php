@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="container " style="padding-top: 5%;">
    <div class="col-md-2">
        <button class="btn2" onclick="go_back()">Volver&nbsp;
            <i class="fa fa-undo" aria-hidden="true"></i>
        </button>
    </div>
    
<div class="col-md-8 " style="padding-top: 5%;">
    <div class="panel panel-default">
        <div class="panel-heading">Nueva cancha</div>
        <div class="panel-body">
            {!! Form::open(['url' => 'admin/cancha/nueva' , 'method' => 'post']) !!}
                    
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
          <form>
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
                    <div class="col-md-6 ">
                        <label>Cantidad de jugadores</label>
                        {!! Form::select('cant_jugadores', $arr3 , null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        <label>¿ Tiene iluminación ?</label>
                        {!! Form::select('tiene_luz', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label>¿ Es techada ?</label>
                        {!! Form::select('techada', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        <label>Deportes</label>
                        {!! Form::select('id_deporte', $arr , null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group col-md-12">
                     <label>Tipo de superficie</label>
                    {!! Form::select('id_superficie', $arr2 , null, ['class' => 'form-control']) !!}
                </div>
              <div style="text-align: center;">
                <button class="btn2">Agregar</button>
              </div>
            {!! Form::close() !!}
          </form>
        </div>
    </div>   
</div>
@endsection
