@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{ URL::asset('css/inicio.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/inicio.js') }}"></script>

<select id="id_ciudad">
@foreach ($ciudades as $ciudad)
  <option value="{{ $ciudad->id}}">{{ $ciudad->ciudad_nombre}}</option>
  
@endforeach
</select>
<!-- div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">este es el inicio</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'canchas/busqueda', 'method' => 'GET', 'role'=> 'search'])!!}
                    <div class="form-group">
                        
                        <?php 
                                $ciudades = DB::table('ciudad')->get();
                                $arr = array();
                                foreach($ciudades as $ciudad)
                                {
                                    $arr[$ciudad->id] = $ciudad->ciudad_nombre;
                                }
                        
                                $superficie = DB::table('superficie')->get();
                                $arr2 = array();
                                foreach($superficie as $sup)
                                {
                                    $arr2[$sup->id] = $sup->superficie;
                                }
                        
                                $arr3 = array('3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12');
                        
                                $deportes = DB::table('deporte')->get();
                                $arr4 = array();
                                foreach($deportes as $deporte)
                                {
                                    $arr4[$deporte->id] = $deporte->deporte;
                                }
                        ?>
                        
                        {{Form::select('ciudad', $arr , null, ['class' => 'form-control'])}}
                        
                        {!! Form::select('cantjugadores', $arr3 , null, ['class' => 'form-control']) !!}
                        
                        {!!Form::select('superficie', $arr2 , null, ['class' => 'form-control']) !!}
                        
                        {!! Form::select('deporte', $arr4 , null, ['class' => 'form-control']) !!}                
                        
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection