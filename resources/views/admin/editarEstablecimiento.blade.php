@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Turno</div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['admin.establecimiento.modificar' , $establecimiento->id] ,'method' => 'post']) !!}    
                        
                        <div class="form-group">
                            {!! Form::text('nombre', $establecimiento->nombre, ['class' => 'form-control']) !!}
                            {!! Form::text('direccion', $establecimiento->direccion, ['class' => 'form-control']) !!}
                            {!! Form::select('tienevestuario', ['0' => 'No', '1' => 'Si'], $establecimiento->tienevestuario , ['class' => 'form-control']) !!} 
                            {!! Form::select('id_ciudad', $arrCiudades, $establecimiento->id_ciudad , ['class' => 'form-control']) !!}
                        </div>
					   
                        {!! Form::submit('Modificar') !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
