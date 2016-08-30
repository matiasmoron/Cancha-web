@extends('layouts.app')

@section('content')



<script type="text/javascript" src="{{ URL::asset('js/inicio.js') }}"></script>
 
<link rel="stylesheet" href="{{ URL::asset('css/inicio/form-elements.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/inicio/inicio.css')}}">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Reservá</strong> tu cancha de forma <strong>online</strong></h1>
                        <div class="description">
                            <p>
                                El sitio pensado por alguien como vos, para gente como nosotros.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Reservá tu cancha ya</h3>
                                <p>Ingresá que día querés jugar, y listo:</p>
                            </div>
                            <div class="form-top-right">
                            <i class="fa fa-futbol-o"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            {!! Form::open(['url' => 'turnos/todos', 'method' => 'GET', 'role'=> 'search'])!!}
                                <div class="row form-group">
                                    <div class="col-md-6">
                                    
                                        <select id="deportes"></select>
                                    </div>
                                  {{--   <div class="col-md-6">
                                        <label class="sr-only" for="form-password">Fecha</label>
                                       
                                    </div> --}}
                                    <div class='col-md-6'>
                                       <div class="form-group">
                                          {{--  <div class='input-group date' id='datetimepicker'> --}}
                                                
                                              {{--     <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime">
                                               <span class="input-group-addon">
                                                   <span class="glyphicon glyphicon-calendar"></span>
                                               </span>
                                           </div> --}}
                                           <div class="input-append date form_datetime">
                                              {!!Form::text('fecha_turno', \Carbon\Carbon::now(), ['class' => 'form-control','id'=>'fecha']) !!}
                                               <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn">Conseguir turno</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <h3>Ingresá por..</h3>
                        <div class="social-login-buttons">
                            <a class="btn btn-link-1" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-2" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-3" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

<script type="text/javascript">
   
</script> 
@endsection