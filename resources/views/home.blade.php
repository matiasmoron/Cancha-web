@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Busca tu Cancha</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'canchas/todas', 'method' => 'GET', 'role'=> 'search'])!!}
                    <div class="form-group">
						{!!Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad']) !!}
                        {!!Form::text('cantjugadores', null, ['class' => 'form-control', 'placeholder' => 'Cantidad Jugadores']) !!}
                        {!!Form::text('superficie', null, ['class' => 'form-control', 'placeholder' => 'Tipo de Superficie']) !!}
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
