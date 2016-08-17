@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">

<div class="container">
    <div class="row container-body">
     <h2 style="text-align: center;">Tus establecimientos</h2>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" >
               
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
                            {{-- {!! Form::submit('Editar Establecimiento') !!} --}}
                        
                        <button class="btn2">Editar establecimiento</button>
                        {!!Form::close()!!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection