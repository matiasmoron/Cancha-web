<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TurnoAdmin;
use App\Cancha;
use App\Establecimiento;
use App\Ciudad;
use DB;
use Carbon\Carbon;

class TurnoAdminController extends Controller
{
    
    public function turnosBusqueda(Request $request)
    {

        $datos = DB::raw(
        SELECT e.id AS id_est,e.nombre,e.direccion,
c.id as id_can,c.nombre_cancha,c.cant_jugadores,
ta.horaInicio,ta.horaFin,ta.precio_cancha
FROM turnoadmin as ta 
LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id
INNER JOIN cancha as c ON ta.id_cancha = c.id
INNER JOIN establecimiento as e ON c.id_establecimiento = e.id
WHERE id_dia = 1  AND tu.id_turnoAdmin IS NULL)->get();

        dd($datos);


        /*$fecha = $request->get('fecha_turno');

        $dia = Carbon::createFromDate(substr($fecha,0,4),substr($fecha,5,2),substr($fecha,8,10));

        $dia = $dia->format('l');

        $datos = DB::table('establecimiento')
                    ->join('cancha','cancha.id_establecimiento','=','establecimiento.id')
                    ->join('turnoadmin', 'turnoadmin.id_cancha','=', 'cancha.id')
                    ->join('dia', 'dia.id','=','turnoadmin.id_dia')
                    ->where('dia_ingles', '=', $dia)
                    ->get();


        $array = collect($datos);

        $array = $array->groupBy('id');

        dd($array);

        foreach ($array as $key => $value) 
        {
            $value = collect($value);
        }

        dd($array);


        $id_ciudad = Ciudad::select('id')->where('ciudad_nombre','=','Bahia Blanca')->first()->id;

		$establecimientos = Establecimiento::where('id_ciudad', '=', $id_ciudad)->get();
       
        return view('turnos.todos', ['establecimientos' => $establecimientos, 'fecha' => $request->get('fecha_turno')]);*/
    }
}
