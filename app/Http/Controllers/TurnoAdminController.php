<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TurnoAdmin;

class TurnoAdminController extends Controller
{
    
    public function turnosBusqueda(Request $request)
    {
        $turnos = TurnoAdmin::Turnos(
            $request->get('fecha_turno'))->get();

        dd($turnos);
        
        return view('turnos.todos', ['turnos' => $turnos]);
    }
}
