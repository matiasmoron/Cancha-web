<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

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

    public function reservarTurno(Request $request)
    {
        alert('Hello World!')->persistent("Close this");

        $id_dia = Dia::where('dia_ingles','=',$request->get('dia'))->get();      

        $id_turnoAdmin = TurnoAdmin::where('id_dia','=', $id_dia[0]->id)->where('horaInicio','=',$request->get('horaInicio'))->where('horaFin','=',$request->get('horaFin'))->get();

        TurnoUsuario::create(['id_turnoAdmin' => $id_turnoAdmin[0]->id, 'fecha_inicio' => $request->get('fecha'), 'confirmado' => '0', 'pagado' => '0', 'estado' => '0', 'id_usuario' =>  Auth::user()->id]);
         
        return redirect('usuarios/turnos');
    }
}
