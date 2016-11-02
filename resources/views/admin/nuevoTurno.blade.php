
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">


<div class="col-md-2 volver">
    <button class="btn2" onclick="go_back()">Volver&nbsp;
        <i class="fa fa-undo" aria-hidden="true"></i>
    </button>
</div>

<div class="container"> 
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTituloAdmin">
            <h2>Creación de un nuevo turno</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
             Agregá nuevos turnos a tu cancha&nbsp;&nbsp; <i class="fa fa-pencil"></i>
         </div>
         <div class="col-md-4 col-sm-4 col-xs-4">
            <hr width="100%">
        </div>
    </div>
    <div class="row">
     @include('partials/errors')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva turno</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/turno/nuevo' , 'method' => 'post']) !!}    
                    <form>
                      <div class="form-group col-md-12">
                        <div class="col-md-6 ">
                            <label>Cancha</label>
                             {!! Form::select('id_cancha', $arrCanchas , null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6 ">
                            <label>Día</label>
                            {!! Form::select('id_dia', $arrDias , null, ['class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-6 ">
                                <label>Hora de inicio</label>
                                {!!Form::time('horaInicio', \Carbon\Carbon::now(), ['class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-6">
                                <label>Hora de fin</label>
                               {!!Form::time('horaFin', \Carbon\Carbon::now(), ['class' => 'form-control','required']) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <label>Precio del turno</label>
                               {!!Form::number('precio_cancha', 0 , ['class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-4">
                                <label>¿Precio adicional por luz?</label>
                                {!! Form::select('adic_luz', ['0' => 'No', '1' => 'Si'] , 0 , ['class' => 'form-control','id'=>'adic_luz']) !!}
                            </div>
                            <div class="col-md-4" >
                                <label>Precio adicional</label>
                                {!!Form::number('precio_adicional', 0 , ['class' => 'form-control','disabled','id'=>'precio_adic']) !!}
                            </div>
                        </div>
                        {!! Form::hidden('id_usuario_admin', Auth::user()->id) !!}
                      <div style="text-align: center;">
                        <button class="btn2">Agregar</button>
                      </div>
                    {!! Form::close() !!}
                  </form>
                </div>
            </div>
        </div>
    </div>   
</div>
</div>
</div>

<script type="text/javascript">
    $("#adic_luz").change(function(){
        if($(this).val()==1){
            console.log("true");
            $("#precio_adic").prop('disabled', false);
        }
        else{
            console.log("false");
            $("#precio_adic").prop('disabled', true);
        }
    });

</script>
@endsection
