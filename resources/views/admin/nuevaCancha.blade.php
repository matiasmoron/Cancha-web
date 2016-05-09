@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Establecimiento</div>
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
                        <div class="form-group">
                            {!! Form::select('id_establecimiento', $arr4 , null, ['class' => 'form-control']) !!}
                            {!!Form::text('nombre_cancha', null, ['class' => 'form-control', 'placeholder' => 'Nombre Cancha']) !!}
                            {!! Form::select('cant_jugadores', $arr3 , null, ['class' => 'form-control']) !!}
                            {!! Form::select('tiene_luz', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                            {!! Form::select('techada', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                            {!! Form::select('id_deporte', $arr , null, ['class' => 'form-control']) !!}
                            {!! Form::select('id_superficie', $arr2 , null, ['class' => 'form-control']) !!}
                        </div>
					   
                        {!! Form::submit('Agregar') !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
