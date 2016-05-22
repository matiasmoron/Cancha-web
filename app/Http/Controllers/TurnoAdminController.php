<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TurnoAdmin;
use App\Cancha;
use App\Establecimiento;
use App\Ciudad;
use DB;

class TurnoAdminController extends Controller
{
    
    public function turnosBusqueda(Request $request)
    {
        $join = TurnoAdmin::get();


        $array = collect($join->toArray());

        dd(json_encode($array->groupBy('id_cancha')));

        $id_ciudad = Ciudad::select('id')->where('ciudad_nombre','=','Bahia Blanca')->first()->id;

		$establecimientos = Establecimiento::where('id_ciudad', '=', $id_ciudad)->get();
       
        return view('turnos.todos', ['establecimientos' => $establecimientos, 'fecha' => $request->get('fecha_turno')]);
    }
}
