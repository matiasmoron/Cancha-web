<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Establecimiento;
use App\Cancha;

class UserController extends Controller
{
    public function adminhome()
    
    {
        return view('admin.adminhome');
    }
    
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
        
        /*$arr = $request->all();
        
        unset($arr['_token']);*/
        
        Cancha::create($request->all());
         
        return redirect('admin/cancha');
    }
    
    public function verDatos()
    {
        $usuario = Auth::user();
        
        return view('admin.datos',['usuario' => $usuario]);
    }
}