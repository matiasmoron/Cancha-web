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
        $turnosUser = TurnoUsuario::get()->where('id_usuario', Auth::user()->id);
        
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

        return view('turnos.previsualizar2', ['cancha' => $cancha, 'establecimiento' => $establecimiento, 'turnoAdmin' => $turnoAdmin[0], 'arrayHoraIni' => $request->get('arrayHoraIni'), 'arrayHoraFin' => $request->get('arrayHoraFin'), 'fecha' => $request->get('fecha'), 'establecUser' => $establecimientosUser]);

    }

    public function reservarTurno(Request $request)
    {
        alert('Hello World!')->persistent("Close this");      

        TurnoUsuario::create(['id_turnoAdmin' => $request->get('id_turnoAdmin'), 'fecha_inicio' => $request->get('fecha'), 'confirmado' => '0', 'pagado' => '0', 'estado' => '0', 'id_usuario' =>  Auth::user()->id]);
         
        return redirect('usuarios/turnos');
    }
}
