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
        $deporte = $request->get('id_deporte');


        $dia = Carbon::createFromDate(substr($fechaR,0,4),substr($fechaR,5,2),substr($fechaR,8,10));

        $dia = $dia->format('l');

        $fecha = substr($fechaR,0,4)."-".substr($fechaR,5,2)."-".substr($fechaR,8,10);


        $query = "select 
                e.id as id_est,
                e.nombre,
                e.direccion,
                c.id as id_can,
                c.nombre_cancha,
                c.cant_jugadores,
                s.superficie,
                GROUP_CONCAT(ta.precio_cancha SEPARATOR ',') as precios,
                GROUP_CONCAT(ta.horaInicio SEPARATOR ',') as horaIni,
                GROUP_CONCAT(ta.horaFin SEPARATOR ',') as horaFin
                FROM turnoadmin as ta 
                LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id 
                INNER JOIN cancha as c ON ta.id_cancha = c.id
                INNER JOIN establecimiento as e ON c.id_establecimiento = e.id
                INNER JOIN dia as d ON d.dia_ingles = '".$dia."'
                INNER JOIN superficie as s ON c.id_superficie = s.id
                INNER JOIN deporte as dp ON c.id_deporte = dp.id
                WHERE ta.id_dia = d.id AND c.id_deporte='".$deporte."' AND  (tu.id_turnoAdmin IS NULL OR tu.fecha != '".$fecha."')";


        if(strcmp($request->get('name'),"") !== 0)
        {
            $query.= " AND e.nombre = '".$request->get('name')."'";
        }

        if(!is_null($request->get('id_superficie')) && strcmp($request->get('id_superficie'),"0") !== 0)
        {
            $query.= " AND s.id = '".$request->get('id_superficie')."'";
        }

        if(!is_null($request->get('id_deporte')) && strcmp($request->get('id_deporte'),"0") !== 0)
        {
            $query.= " AND dp.id = '".$request->get('id_deporte')."'";
        }
        
        if(!is_null($request->get('cantJugadores')) && strcmp($request->get('cantJugadores'),"0") !== 0)
        {
            $cant = $request->get('cantJugadores') + 2;
            $query.= " AND c.cant_jugadores = '".$cant."'";
        }

        //dd($query);

        $query.= " GROUP BY (c.id)
                  ORDER BY e.id,c.id DESC";

        //dd($query);

        $estab = DB::select($query);
        

        $estab = collect($estab);
        $estab = $estab->groupBy('id_est');

        return view('canchas.turnoBusqueda', ['estab' => $estab, 'fecha' => $fecha, 'dia' => $dia, 'deportes' => $this->getDeportes(1), 'ciudad' => $this->getCiudades(1), 'superficie' => $this->getSuperficies(1), 'jugadores' => $this->getCantJugadores(1), 'rank' => $this->getRank()]);

    }
}
