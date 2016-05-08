<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Turno;

class TurnoController extends Controller
{
    public function misturnos()
    {
        $user = Auth::user();
        
        $turnos = Turno::get()->where('id_usuario',$user->id);
        
        return view('usuarios.turnos', ['turnos' => $turnos]);
    }
    
    public function turnoscancha($id)
    {
        $turnos = Turno::where('id_cancha',$id)->get();
        return view('turnos.cancha', ['turnos' => $turnos]);
    }
}
