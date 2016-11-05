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
        //dd($fechaR, substr($fechaR,3,2));
        $dia = Carbon::createFromDate(substr($fechaR,6,10),substr($fechaR,3,2),substr($fechaR,0,2));

        $dia = $dia->format('l');


        $fecha = substr($fechaR,0,4)."-".substr($fechaR,5,2)."-".substr($fechaR,8,10);

        $query = "select
                e.id as id_est,
                e.nombre,
                e.direccion,
                c.id as id_can,
                c.nombre_cancha,
                c.cant_jugadores,
                c.techada,
                c.tiene_luz,
                s.superficie,
                count(ta.id) cant_turnos,
                s.id as id_superficie,
                GROUP_CONCAT(ta.id SEPARATOR ',') as id_turnos,
                GROUP_CONCAT(ta.precio_cancha SEPARATOR ',') as precios,
                GROUP_CONCAT(ta.horaInicio SEPARATOR ',') as horaIni,
                GROUP_CONCAT(ta.horaFin SEPARATOR ',') as horaFin
                FROM turnoadmin as ta  
                INNER JOIN cancha as c ON ta.id_cancha = c.id
                INNER JOIN establecimiento as e ON c.id_establecimiento = e.id
                INNER JOIN dia as d ON d.dia_ingles = '".$dia."'
                INNER JOIN superficie as s ON c.id_superficie = s.id
                INNER JOIN deporte as dp ON c.id_deporte = dp.id
                WHERE ta.id_dia = d.id AND ta.habilitado = 1 AND (ta.id NOT IN (SELECT ta2.id FROM turnousuario as tu2 INNER JOIN turnoadmin as ta2 WHERE ta2.id = tu2.id_turnoAdmin AND tu2.fecha = '".$fecha."'))";


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


        $query.= " GROUP BY (c.id)
                  ORDER BY e.id,c.id DESC";

        $estab = DB::select($query);
        

        $estab = collect($estab);
        $estab = $estab->groupBy('id_est');

        // dd($fechaR);

        return view('canchas.turnoBusqueda2', ['estab' => $estab, 'fecha' => $fechaR, 'dia' => $dia, 'deportes' => $this->getDeportes(1), 'ciudad' => $this->getCiudades(1), 'superficie' => $this->getSuperficies(1), 'jugadores' => $this->getCantJugadores(1), 'rank' => $this->getRank()]);

    }
}
