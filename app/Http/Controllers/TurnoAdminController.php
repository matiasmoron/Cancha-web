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

        $fechaR = $request->get('fecha_turno');

        $dia = Carbon::createFromDate(substr($fechaR,0,4),substr($fechaR,5,2),substr($fechaR,8,10));

        $dia = $dia->format('l');

        $fecha = substr($fechaR,0,4)."-".substr($fechaR,5,2)."-".substr($fechaR,8,10);

        $canchas = DB::select("select 
        e.id as id_est,
        e.nombre,
        e.direccion,
        c.id as id_can,
        c.nombre_cancha,
        c.cant_jugadores,
        GROUP_CONCAT(ta.horaInicio SEPARATOR ',') as horaIni,
        GROUP_CONCAT(ta.horaFin SEPARATOR ',') as horaFin,
        ta.precio_cancha 
        FROM turnoadmin as ta 
        LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id 
        INNER JOIN cancha as c ON ta.id_cancha = c.id 
        INNER JOIN establecimiento as e ON c.id_establecimiento = e.id
        INNER JOIN dia as d ON d.dia_ingles = '".$dia."' 
        WHERE ta.id_dia = d.id AND (tu.id_turnoAdmin IS NULL OR tu.fecha_inicio != '".$fecha."') 
        GROUP BY (c.id)
        ORDER BY e.id,c.id DESC");

        //dd($canchas);

        return view('canchas.turnoBusqueda', ['canchas' => $canchas, 'fecha' => $fecha, 'dia' => $dia]);

    }
}
