
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/admin/turnosAdmin.js') }}"></script>



<div class="col-md-2" style="padding-top: 5%;">
    <button class="btn2" onclick="go_back()">Volver&nbsp;
        <i class="fa fa-undo" aria-hidden="true"></i>
    </button>
</div>
<div class="container" style="padding-top: 10%;">
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTituloAdmin">
            <h2>Administración de tus turnos</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               Administrá tus turnos&nbsp;&nbsp; <i class="fa fa-pencil"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
        </div>
    </div>   
    <div class="row" >
        <div class="col-md-12 col-sm-12 col-xs-12">
            <ol class="lista col-md-12 col-sm-12 col-xs-12">
                <?php $panel = 1 ?>
                 @foreach($turnosAdmin as $turnos_cancha)
                        <div class="establec col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0; padding-top:1%;padding-bottom:2%;">
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0;">
                                        <a class="nombreEstabl linkEstabl"> {{$turnos_cancha[0]->cancha->nombre_cancha}}</a>
                                    </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="float:right; ">
                                <div class="panel-group col-md-12 col-sm-12 col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id={{$panel}} style="padding-left:0px; background-color: #3b5998;">
                                          <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href={{"#collapse".$panel}} aria-expanded="false" aria-controls={{"collapse".$panel}}><span class="linkTurno">Ver turnos</span>
                                            <i class="fa fa-btn glyphicon glyphicon-chevron-down" style="float: right;"></i></a>
                                          </h4>
                                        </div>
                                        <div id={{"collapse".$panel}} class="panel-collapse collapse" role="tabpanel" aria-labelledby={{$panel}} style="background-color: #F3F3F3;">
                                           <table class="table table-striped" class="t-center">
                                               <thead>
                                                 <tr>
                                                   <th class="t-left">Día</th>
                                                   <th class="t-center">Hora inicio</th>
                                                   <th class="t-center">Hora fin</th>
                                                   <th class="t-right">Precio</th>
                                                   <th class="t-right">Precio adic luz</th>
                                                   <th class="t-right">Fijo</th>
                                                   <th class="t-right">Habilitado</th>
                                                   <th class="t-center"><i class="fa fa-btn glyphicon glyphicon-share-alt"></i></th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                               @foreach($turnos_cancha as $turno)
                                                 <tr>
                                                   <td class="t-left">{{$turno->dia->dia}}</td>
                                                   <td class="t-center">{{$turno->horaInicio}}</td>
                                                   <td class="t-center">{{$turno->horaFin}}</td>
                                                   <td class="t-right">${{$turno->precio_cancha}}</td>
                                                   @if($turno->adic_luz == 1)
                                                       <td class="t-right">${{$turno->precio_adicional}}</td>
                                                   @else
                                                       <td class="t-center">-</td>
                                                   @endif

                                                   @if($turno->fijo == 1)
                                                       <td class="t-right">Si</td>
                                                   @else
                                                       <td class="t-center">No</td>
                                                   @endif

                                                   @if($turno->habilitado == 1)
                                                       <td class="t-right">Si</td>
                                                   @else
                                                       <td class="t-center">No</td>
                                                   @endif

                                                    <td class="t-center col-md-3 col-sm-12 col-xs-12">
                                                      <div class="col-md-6 col-sm-12 col-xs-12">
                                                        {!! Form::open(['route' => ['admin.turno'] ,'method' => 'get'])!!}
                                                          {{Form::hidden('id_turnoAdmin', $turno->id)}}
                                                          <button class="btn2" style="width:100%;">Editar</button>
                                                        {!!Form::close()!!}
                                                      </div>
                                                      <div class="col-md-6 col-sm-12 col-xs-12">
                                                        {!! Form::open(['route' => ['admin.turno'], 'method' => 'DELETE','id'=>'form_'.$panel])!!}
                                                          {{Form::hidden('id_turnoAdmin', $turno->id)}}
                                                        {!!Form::close()!!}
                                                          <button class="btn2 eliminar" data-id={{"form_".$panel}} style="width:100%;">Eliminar</button>
                                                      </div>

                                                      <div class="col-md-6 col-sm-12 col-xs-12">
                                                        {!! Form::open(['route' => ['admin.fijarTurno'], 'method' => 'POST', 'id'=>'formFijar_'.$panel])!!}
                                                          {{Form::hidden('id_turnoAdmin', $turno->id)}}
                                                        {!!Form::close()!!}
                                                        @if($turno->fijo === 0)
                                                          <button class="btn2 fijar" data-id={{"formFijar_".$panel}} style="width:100%;">Fijar</button>
                                                        @else
                                                          <button class="btn2 desfijar" data-id={{"formFijar_".$panel}} style="width:100%;">Sacar Fijo</button>
                                                        @endif
                                                      </div>

                                                      @if($turno->fijo === 0)
                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                          {!! Form::open(['route' => ['admin.habilitarTurno'], 'method' => 'POST', 'id'=>'formInhabil_'.$panel])!!}
                                                            {{Form::hidden('id_turnoAdmin', $turno->id)}}
                                                          {!!Form::close()!!}
                                                          @if($turno->habilitado === 1)
                                                            <button class="btn2 inhabilitar" data-id={{"formInhabil_".$panel}} style="width:100%;">Inhabilitar</button>
                                                          @else
                                                            <button class="btn2 habilitar" data-id={{"formInhabil_".$panel}} style="width:100%;">Habilitar</button>
                                                          @endif
                                                        </div>
                                                      @endif

                                                    </td>
                                                 </tr>
                                                @endforeach
                                               </tbody>
                                             </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $panel++?>
                        </div>
                @endforeach 
            </ol>
        </div>
    </div>
</div>

<script>
  $(".eliminar").on('click',function(e){
      var id = $(this).data('id');
      e.preventDefault();
      swal({   
          title: "¿Estas seguro?",   
          text: "¡Recuerda que no se podrá recuperar el turno posteriormente!",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",  
          confirmButtonText: "Si, Eliminar",   
          cancelButtonText: "¡No, Cancelar!",   
          closeOnConfirm: false,   
          closeOnCancel: false },
       function(isConfirm){
          if (isConfirm) {
            $("#"+id).submit();   
          } 
          else {     
            swal("Cancelado", "Tu turno no ha sido borrado ;)", "error");   
          } 
      });
  });

  $(".fijar").on('click',function(e){
      var id = $(this).data('id');
      e.preventDefault();
      swal({   
          title: "¿Estas seguro?",   
          text: "¡Se establecerá que el turno como fijo!",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",  
          confirmButtonText: "Si, Fijar",   
          cancelButtonText: "¡No, Cancelar!",   
          closeOnConfirm: false,   
          closeOnCancel: false },
       function(isConfirm){
          if (isConfirm) {
            $("#"+id).submit();   
          } 
          else {     
            swal("Cancelado", "Tu turno no ha fijado ;)", "error");   
          } 
      });
  });

  $(".desfijar").on('click',function(e){
      var id = $(this).data('id');
      e.preventDefault();
      swal({   
          title: "¿Estas seguro?",   
          text: "¡Se establecerá que el turno quede libre!",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",  
          confirmButtonText: "Si, Liberar",   
          cancelButtonText: "¡No, Cancelar!",   
          closeOnConfirm: false,   
          closeOnCancel: false },
       function(isConfirm){
          if (isConfirm) {
            $("#"+id).submit();   
          } 
          else {     
            swal("Cancelado", "Tu turno no se ha liberado ;)", "error");   
          } 
      });
  });

  $(".inhabilitar").on('click',function(e){
      var id = $(this).data('id');
      e.preventDefault();
      swal({   
          title: "¿Estas seguro?",   
          text: "¡Se establecerá que el turno como inhabilitado!",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",  
          confirmButtonText: "Si, Deshabilitar",   
          cancelButtonText: "¡No, Cancelar!",   
          closeOnConfirm: false,   
          closeOnCancel: false },
       function(isConfirm){
          if (isConfirm) {
            $("#"+id).submit();   
          } 
          else {     
            swal("Cancelado", "Tu turno no ha sido inhabilitado ;)", "error");   
          } 
      });
  });

  $(".habilitar").on('click',function(e){
      var id = $(this).data('id');
      e.preventDefault();
      swal({   
          title: "¿Estas seguro?",   
          text: "¡Se establecerá que el turno como habilitado!",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",  
          confirmButtonText: "Si, Habilitar",   
          cancelButtonText: "¡No, Cancelar!",   
          closeOnConfirm: false,   
          closeOnCancel: false },
       function(isConfirm){
          if (isConfirm) {
            $("#"+id).submit();   
          } 
          else {     
            swal("Cancelado", "Tu turno no ha sido habilitado ;)", "error");   
          } 
      });
  });

  @if(notify()->ready())
    swal({
        title: "{{notify()->message()}}",
        type: "{{notify()->type()}}",
    });
  @endif
</script>

@endsection 