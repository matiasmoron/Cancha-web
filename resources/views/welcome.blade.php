@extends('layouts.app')

@section('content')

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../img/cancha1.jpg" alt="Chania" width="460" height="345" align="canter">
      </div>

      <div class="item">
        <img src="../img/cancha2.jpg" alt="Chania" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="../img/cancha1.jpg" alt="Flower" width="460" height="345">
      </div>

      <div class="item">
        <img src="../img/cancha2.jpg" alt="Flower" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Busca tu Cancha</div>
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
</div>
@endsection