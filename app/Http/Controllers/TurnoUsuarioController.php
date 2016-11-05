<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Establecimiento;
use App\Cancha;
use App\TurnoUsuario;
use App\TurnoAdmin;
use App\Dia;
use Carbon\Carbon;
use DB;

class TurnoUsuarioController extends Controller
{
    public function misturnos()
    {
        $turnosUser = DB::select("select 
                c.id_establecimiento as id_estab,
                c.id as id_canc,
                c.nombre_cancha as nombreCancha,
                d.dia as dia,
                d.dia_ingles as dia_ingles,
                tu.fecha as fecha,
                tu.id as id_turnoUser,
                GROUP_CONCAT(ta.id SEPARATOR ',') as id_turnos,
                GROUP_CONCAT(ta.precio_cancha SEPARATOR ',') as precios,
                GROUP_CONCAT(tu.confirmado SEPARATOR ',') as confirmados,
                GROUP_CONCAT(ta.horaInicio SEPARATOR ',') as horaIni,
                GROUP_CONCAT(ta.horaFin SEPARATOR ',') as horaFin
                FROM turnoadmin as ta 
                LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id
                LEFT JOIN dia as d ON ta.id_dia = d.id 
                LEFT JOIN cancha as c ON ta.id_cancha = c.id 
                WHERE tu.id_usuario = ".Auth::user()->id." AND tu.fecha >= CURDATE() 
                GROUP BY (ta.id_dia)
                ORDER BY ta.id_dia ASC");

        //dd($turnosUser);
        
        return view('usuarios.turnos', ['turnosUser' => $turnosUser]);
    }
    
    public function turnoscancha($id)
    {
        $turnos = TurnoAdmin::where('id_cancha',$id)->get();
        return view('turnos.cancha', ['turnos' => $turnos]);
    }

    public function buscarTurno($id_turnoAdmin, $dia, $horaInicio, $horaFin)
    {
        $dia_turno1 = new Carbon('this '.$dia);

        dd(TurnoUsuario::where('fecha_inicio','=', $dia_turno1->toDateString())->get());      

    }

    public function previsualizarTurno(Request $request)
    {

        $turno = TurnoUsuario::where("id_turnoAdmin", "=", $request->get('id_turnoAdmin'))->where("fecha", "=", $request->get('fecha'))->get();

        if($turno->isEmpty() || strcmp($request->get('flag'),"1") === 0)
        {

            $establecimiento = Establecimiento::find($request->get('id_establecimiento'));
            $cancha = Cancha::find($request->get('id_cancha'));

            $id_dia = Dia::where('dia_ingles','=',$request->get('dia'))->get();      

            $turnoAdmin = TurnoAdmin::find($request->get('id_turnoAdmin'));

            $establecimientosUser = Establecimiento::where('id_usuario', Auth::user()->id)->get();

            $coord = $this->getCoordenadas($establecimiento->direccion . "," .$establecimiento->ciudad->ciudad_nombre . "," .$establecimiento->provincia_nombre);

            $turnoUser = TurnoUsuario::where('id_turnoAdmin', '=' , $turnoAdmin->id)->where('fecha', '=', $request->get('fecha'))->get()->isEmpty();

            $turnosAlter = DB::select("select
                    GROUP_CONCAT(ta.id SEPARATOR ',') as id_turnos, 
                    GROUP_CONCAT(ta.precio_cancha SEPARATOR ',') as precios,
                    GROUP_CONCAT(ta.horaInicio SEPARATOR ',') as horaIni,
                    GROUP_CONCAT(ta.horaFin SEPARATOR ',') as horaFin
                    FROM turnoadmin as ta 
                    LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id 
                    INNER JOIN cancha as c ON ta.id_cancha = c.id
                    WHERE ta.id_dia = '".$id_dia[0]->id."' AND ta.habilitado = 1 AND (ta.id NOT IN (SELECT ta2.id FROM turnousuario as tu2 INNER JOIN turnoadmin as ta2 WHERE ta2.id = tu2.id_turnoAdmin AND tu2.fecha = '".$request->get('fecha')."')) AND c.id = '".$request->get('id_cancha')."' AND ta.horaInicio != '".$turnoAdmin->horaInicio."' AND ta.horaFin != '".$turnoAdmin->horaFin."'");

            return view('turnos.previsualizar3', ['cancha' => $cancha, 'establecimiento' => $establecimiento, 'turnoAdmin' => $turnoAdmin, 'fecha' => $request->get('fecha'), 'establecUser' => $establecimientosUser, 'coord' => $coord, 'dia' => $request->get('dia'), 'turnoUser' => $turnoUser, 'turnosAlter' => $turnosAlter]);
        }
        else
        {
            notify()->flash('Lo sentimos! El turno fue reservado por otro usuario anteriormente. Busca un nuevo turno :D','error');
            return redirect('/');
        }

    }

    public function reservarTurno(Request $request)
    {
              

        $turno = TurnoUsuario::where("id_turnoAdmin", "=", $request->get('id_turnoAdmin'))->where("fecha", "=", $request->get('fecha'))->get();
        notify()->flash('Esta seguro que quiere realizar la reserva','confirm');

        if($turno->isEmpty())
        {
            $fecha = Carbon::createFromFormat('Y-m-d', $request->get('fecha'))->toDateString();
            $turno = TurnoUsuario::create(['id_turnoAdmin' => $request->get('id_turnoAdmin'), 'fecha' => $fecha, 'confirmado' => '0', 'pagado' => '0', 'estado' => '0', 'id_usuario' =>  Auth::user()->id]);
           
            notify()->flash('Tu turno ha sido reservado exitosamente! Yeep!','success');
            return redirect('usuarios/turnos');
            //return redirect('send');
        }
        else
        {
            notify()->flash('Lo sentimos! El turno fue reservado por otro usuario anteriormente :(','error');
            return redirect('/'); 
        }
        

    }

    public function eliminarTurno(Request $request)
    {
        $turnoUser = TurnoUsuario::find($request->get('id_turnoUser'));

        try
        {
            $turnoUser->delete();
            notify()->flash('Tu reserva ha sido eliminada exitosamente! Yeep!','success');
            return redirect('usuarios/turnos');
        }
        catch(\Exception $e)
        {
            notify()->flash('Lo sentimos! Se produjo un error al eliminar tu reserva.','error');
            return redirect('usuarios/turnos');
        }
    }
}
