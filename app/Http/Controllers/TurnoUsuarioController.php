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
use Alert;

class TurnoUsuarioController extends Controller
{
    public function misturnos()
    {

        $turnosUser = DB::select("select 
                d.dia,
                GROUP_CONCAT(ta.precio_cancha SEPARATOR ',') as precios,
                GROUP_CONCAT(tu.confirmado SEPARATOR ',') as confirmados,
                GROUP_CONCAT(ta.horaInicio SEPARATOR ',') as horaIni,
                GROUP_CONCAT(ta.horaFin SEPARATOR ',') as horaFin
                FROM turnoadmin as ta 
                LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id
                LEFT JOIN dia as d ON ta.id_dia = d.id 
                WHERE tu.id_usuario = ".Auth::user()->id."
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
        $establecimiento = Establecimiento::find($request->get('id_establecimiento'));
        $cancha = Cancha::find($request->get('id_cancha'));

        $id_dia = Dia::where('dia_ingles','=',$request->get('dia'))->get();      

        $turnoAdmin = TurnoAdmin::where('id_dia','=', $id_dia[0]->id)->where('horaInicio','=',$request->get('horaInicio'))->where('horaFin','=',$request->get('horaFin'))->get();

        $establecimientosUser = Establecimiento::where('id_usuario', Auth::user()->id)->get();

        return view('turnos.previsualizar2', ['cancha' => $cancha, 'establecimiento' => $establecimiento, 'turnoAdmin' => $turnoAdmin[0], 'arrayHoraIni' => $request->get('arrayHoraIni'), 'arrayHoraFin' => $request->get('arrayHoraFin'), 'arrayPrecios' => $request->get('arrayPrecios'), 'fecha' => $request->get('fecha'), 'establecUser' => $establecimientosUser]);

    }

    public function reservarTurno(Request $request)
    {
        //alert('Hello World!')->persistent("Close this");      


        $fecha = Carbon::createFromFormat('Y-m-d', $request->get('fecha'))->toDateString();

        //dd($fecha);

        $turno = TurnoUsuario::create(['id_turnoAdmin' => $request->get('id_turnoAdmin'), 'fecha' => $fecha, 'confirmado' => '0', 'pagado' => '0', 'estado' => '0', 'id_usuario' =>  Auth::user()->id]);
         
        return redirect('usuarios/turnos');
    }
}
