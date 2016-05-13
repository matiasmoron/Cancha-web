@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
                <h2 style="padding-bottom:20px;">Tus Establecimientos</h2>
                @foreach($establecimiento as $establec)
                    <div class="panel-heading">{{$establec->nombre}}</div>
                    <div class="panel-body">
                        <p>Direccion: {{$establec->direccion}}</p>
                                            
                        @if($establec->tienevestuario == 1)
                            <p>Vestuarios: Si</p>
                        @else
                            <p>Vestuarios: No</p>
                        @endif
                        
                        <p>Ciudad: {{$establec->ciudad->ciudad_nombre}}</p>
                        <p>Provincia: {{$establec->ciudad->provincia->provincia_nombre}}</p>
                        {!! Form::open(['route' => ['admin.establecimiento.editar' , $establec->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right'])!!}
                            {!! Form::submit('Editar Establecimiento') !!}
                        {!!Form::close()!!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection