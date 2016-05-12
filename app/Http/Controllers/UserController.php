<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Establecimiento;
use App\Cancha;
use App\TurnoAdmin;
use App\Dia;
use DB;

class UserController extends Controller
{

    //Seccion HOME
    public function adminhome()
    
    {
        return view('admin.adminhome');
    }
    

    //Seccion Establecimiento
    public function verestablecimiento()
    {
        $establecimiento = Establecimiento::get()->where('id_usuario',Auth::user()->id);
        return view('admin.establecimientos', ['establecimiento' => $establecimiento]);
    }
    
    public function establecimientocrear()
    {
        return view('admin.nuevoestablecimiento');
    }
    
    public function establecimientoalmacenar(Request $request)
    {
         
        $this->validate($request, [
        'nombre' => 'required',
        'direccion' => 'required',
        'tienevestuario' => 'required',
        'id_ciudad' => 'required',
        'id_usuario' => 'required'
        ]);
         

         
        Establecimiento::create($request->all());
         
        return redirect('admin/establecimiento');
    }
    
    

    //Seccion Canchas
    public function verCancha()
    {
        $establecimientos = Establecimiento::where('id_usuario', Auth::user()->id)->get();
        return view('admin.canchas', ['establecimientos' => $establecimientos]);
    }
    
    public function canchaCrear()
    {
        return view('admin.nuevaCancha');
    }
    
    public function canchaAlmacenar(Request $request)
    {
         
        $this->validate($request, [
        'id_establecimiento' => 'required',
        'nombre_cancha' => 'required',
        'cant_jugadores' => 'required',
        'tiene_luz' => 'required',
        'techada' => 'required',
        'id_deporte' => 'required',
        'id_superficie' => 'required'
        ]);
        
        Cancha::create($request->all());
         
        return redirect('admin/cancha');
    }


    //Seccion Turnos Administrador
    public function verTurnosAdmin()
    {
        $turnosAdmin = TurnoAdmin::where('id_usuario_admin', Auth::user()->id)->get();

        return view('admin.turnosAdmin', ['turnosAdmin' => $turnosAdmin]);
    }

    public function turnoAdminCrear()
    {
        return view('admin.nuevoTurno', ['arrCanchas' => $this->getCanchas(), 'arrDias' => $this->getDias()]);
    }
    
    public function turnoAdminAlmacenar(Request $request)
    {
         
        $this->validate($request, [
        'id_cancha' => 'required',
        'id_dia' => 'required',
        'horaInicio' => 'required',
        'horaFin' => 'required',
        'id_usuario_admin' => 'required'
        ]);
        
        TurnoAdmin::create($request->all());
         
        return redirect('admin/turnos');
    }

    public function editarTurnoAdmin($id)
    {
        $turnoAdmin = TurnoAdmin::find($id);

        return view('admin.editarTurno', ['turnoAdmin' => $turnoAdmin, 'arrCanchas' => $this->getCanchas(), 'arrDias' => $this->getDias()]);
    }

    public function modificarTurnoAdmin(Request $request, $id)
    {
        $turnoAdmin = TurnoAdmin::find($id);
        
        //dd($request);

        $turnoAdmin->id_cancha = $request->get('id_cancha');
        $turnoAdmin->id_dia = $request->get('id_dia');
        $turnoAdmin->horaInicio = $request->get('horaInicio'); 
        $turnoAdmin->horaFin = $request->get('horaFin');

        $turnoAdmin->save();     

        return redirect('admin/turnos');
    }

    //Seccion Datos Personales
    public function verDatos()
    {
        $usuario = Auth::user();
        
        return view('admin.datos',['usuario' => $usuario]);
    }

    //Funciones Auxiliares

    public function getDias()
    {
        $dias = Dia::get();
        $arrDias = array();
        foreach($dias as $dia)
        {
            $arrDias[$dia->id] = $dia->dia;
        }

        return $arrDias;
    }

    public function getCanchas()
    {
        $canchas = Cancha::get();
        $arrCanchas = array();
        foreach($canchas as $cancha)
        {
            $arrCanchas[$cancha->id] = $cancha->nombre_cancha;
        }

        return $arrCanchas;
    }
}