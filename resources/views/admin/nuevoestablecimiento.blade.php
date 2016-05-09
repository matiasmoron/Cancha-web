@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Establecimiento</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/establecimiento/nuevo' , 'method' => 'post']) !!}
                    
                    <?php 
                                $ciudades = DB::table('ciudad')->get();
                                $arr = array();
                                foreach($ciudades as $ciudad)
                                {
                                    $arr[$ciudad->id] = $ciudad->ciudad_nombre;
                                }
                        ?>                    
                        <div class="form-group">
                            {!!Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Establecimiento']) !!}
                            {!! Form::select('id_ciudad', $arr , null, ['class' => 'form-control']) !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Direccion']) !!}
                            {!! Form::select('tienevestuario', ['0' => 'No', '1' => 'Si'] , null, ['class' => 'form-control']) !!}
                            {!!Form::hidden('id_usuario', Auth::user()->id) !!}
                        </div>
					   
                        {!! Form::submit('Agregar') !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
