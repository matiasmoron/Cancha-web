<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\TurnoUsuario;
use App\TurnoAdmin;
use Carbon\Carbon;
use DB;

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

        dd(TurnoUsuario::whereDate('fecha_inicio','=',$dia_turno1->toDateString()));      

    }
}
