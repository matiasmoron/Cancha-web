@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}">


<div class="col-md-2" style="padding-top: 5%; display: inline" >
    <button class="btn2" onclick="go_back()">Volver&nbsp;
        <i class="fa fa-undo" aria-hidden="true"></i>
    </button>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centrarTitulo">
            <h2>Administración de establecimientos</h2>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 subtitulo" style="padding-bottom:2%;">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               Administrá tus establecimientos&nbsp;&nbsp; <i class="fa fa-pencil"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <hr width="100%">
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped" class="t-center">
            <thead>
              <tr>
                <th class="t-left">Nombre</th>
                <th class="t-left">Direccion</th>
                <th class="t-center">Vestuarios</th>
                <th class="t-left">Ciudad</th>
                <th class="t-left">Provincia</th>
                <th class="t-center"><i class="fa fa-btn glyphicon glyphicon-share-alt"></i></th>
              </tr>
            </thead>
            <tbody>
            @foreach($establecimiento as $establec)
              <tr>
                <td class="t-left">{{$establec->nombre}}</td>
                <td class="t-left">{{$establec->direccion}}</td>
                 @if($establec->tienevestuario == 1)
                    <td class="t-center">Si</td>
                @else
                    <td class="t-center">No</td>
                @endif
                <td class="t-left">{{$establec->ciudad->ciudad_nombre}}</td>
                <td class="t-left">{{$establec->ciudad->provincia->provincia_nombre}}</td>
                <td class="t-center col-md-3 col-sm-12 col-xs-12">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     {!! Form::open(['route' => ['admin.establecimiento.editar' , $establec->id], 'method' => 'GET'])!!}
                        <button class="btn2" style="width:100%;">Editar</button>
                    {!!Form::close()!!}
                 </div>
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     {!! Form::open(['route' => ['admin.establecimiento.eliminar'], 'method' => 'DELETE'])!!}
                        <button class="btn2" style="width:100%;">Eliminar</button>
                        {!!Form::hidden('id_establecimiento', $establec->id)!!}
                    {!!Form::close()!!}
                 </div>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection