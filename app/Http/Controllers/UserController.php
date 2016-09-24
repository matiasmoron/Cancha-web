<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Establecimiento;
use App\Cancha;
use App\TurnoAdmin;
use App\Dia;
use App\Ciudad;
use App\Deporte;
use App\Superficie;
use Alert;


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

    public function editarEstablecimiento($id)
    {
        $establecimiento = Establecimiento::find($id);

        return view('admin.editarEstablecimiento', ['establecimiento' => $establecimiento, 'arrCiudades' => $this->getCiudades(1)]);
    }

    public function modificarEstablecimiento(Request $request, $id)
    {
        $establecimiento = Establecimiento::find($id);

        $establecimiento->nombre = $request->get('nombre');
        $establecimiento->direccion = $request->get('direccion');
        $establecimiento->tienevestuario = $request->get('tienevestuario'); 
        $establecimiento->id_ciudad = $request->get('id_ciudad');

        $establecimiento->save();     

        return redirect('admin/establecimiento');
    }

    public function eliminarEstablecimiento(Request $request)
    {
        $establ = Establecimiento::find($request->get('id_establecimiento'));

        try
        {
            $establ->delete();
            notify()->flash('Tu Establecimiento ha sido eliminado con exito! Yeep!','success');
            return redirect('admin/establecimiento');
        }
        catch(\Exception $e)
        {
            notify()->flash('No hemos podido eliminar tu establecimiento! :( \n Recuerda que no puedes eliminar un establecimiento si tiene canchas asociadas!','error');
            return redirect('admin/establecimiento');
        }
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

    public function editarCancha($id)
    {
        $cancha = Cancha::find($id);

        return view('admin.editarCancha', ['cancha' => $cancha, 'arrDeportes' => $this->getDeportes(1), 'arrSuperficies' => $this->getSuperficies(1), 'arrCantJugad' => $this->getCantJugadores(1), 'arrEstablecimientos' => $this->getEstablecimientos()]);
    }

    public function modificarCancha(Request $request, $id)
    {
        $cancha = Cancha::find($id);

        $cancha->nombre_cancha = $request->get('nombre_cancha');
        $cancha->id_establecimiento = $request->get('id_establecimiento');
        $cancha->cant_jugadores = $request->get('cant_jugadores');
        $cancha->tiene_luz = $request->get('tiene_luz'); 
        $cancha->techada = $request->get('techada');  
        $cancha->id_deporte = $request->get('id_deporte');
        $cancha->id_superficie = $request->get('id_superficie');
        
        $cancha->save();     

        return redirect('admin/cancha');
    }

    public function eliminarCancha(Request $request)
    {
        $cancha = Cancha::find($request->get('id_cancha'));

        try
        {
            $cancha->delete();
            notify()->flash('Tu cancha ha sido eliminado con exito! Yeep!','success');
            return redirect('admin/cancha');
        }
        catch(\Exception $e)
        {
            notify()->flash('No hemos podido eliminar tu cancha! :( \n Recuerda que no puedes eliminar una cancha si tiene turnos asociada!','error');
            return redirect('admin/cancha');
        }
    }




    //Seccion Turnos Administrador
    public function verTurnosAdmin()
    {
        $turnosAdmin = TurnoAdmin::where('id_usuario_admin', Auth::user()->id)->get();

        $turnosAdmin = collect($turnosAdmin);
        $turnosAdmin = $turnosAdmin->groupBy('id_cancha');

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
        'id_usuario_admin' => 'required',
        'precio_cancha' => 'required',
        ]);
        
        //dd($request->all());

        TurnoAdmin::create([
            'id_cancha' => $request->get('id_cancha'),
            'id_dia' => $request->get('id_dia'),
            'horaInicio' => $request->get('horaInicio'),
            'horaFin' => $request->get('horaFin'),
            'precio_cancha' => $request->get('precio_cancha'),
            'adic_luz' => $request->get('adic_luz'),
            'precio_adicional' => $request->get('precio_adicional'),
            'id_usuario_admin' => $request->get('id_usuario_admin'),
            ]);
         
        return redirect('admin/turnos');
    }

    public function editarTurnoAdmin(Request $request)
    {
        $turnoAdmin = TurnoAdmin::find($request->get('id_turnoAdmin'));

        return view('admin.editarTurno', ['turnoAdmin' => $turnoAdmin, 'arrCanchas' => $this->getCanchas(), 'arrDias' => $this->getDias()]);
    }

    public function modificarTurnoAdmin(Request $request)
    {
        $turnoAdmin = TurnoAdmin::find($request->get('id_turnoAdmin'));

        $turnoAdmin->id_cancha = $request->get('id_cancha');
        $turnoAdmin->id_dia = $request->get('id_dia');
        $turnoAdmin->horaInicio = $request->get('horaInicio'); 
        $turnoAdmin->horaFin = $request->get('horaFin');
        $turnoAdmin->precio_cancha = $request->get('precio_cancha');
        $turnoAdmin->adic_luz = $request->get('adic_luz');
        $turnoAdmin->precio_adicional = $request->get('precio_adicional');

        $turnoAdmin->save();     

        return redirect('admin/turnos');
    }

    public function eliminarTurnoAdmin(Request $request)
    {
        $turnoAdmin = TurnoAdmin::find($request->get('id_turnoAdmin'));

        try
        {
            $turnoAdmin->delete();
            notify()->flash('¡Tu turno ha sido eliminado con exito! Yeep!','success');
            return redirect('admin/turnos');
        }
        catch(\Exception $e)
        {
            notify()->flash('No hemos podido eliminar tu turno! :( \n Comprueba que no existan turnos reservados','error');
            return redirect('admin/turnos');
        }
    }

    //Seccion Datos Personales
    public function verDatos()
    {
        $usuario = Auth::user();
        return view('usuarios.datos',['usuario' => $usuario]);
    }

    public function editarDatos()
    {
        $usuario = Auth::user();
        return view('usuarios.editarDatos',['usuario' => $usuario]);
    }

    public function guardarDatos(Request $request)
    {
        if(strcmp($request->get('password'), $request->get('passwordConf')) === 0)
        {
            $usuario = Auth::user();

            $usuario->name = $request->get('name');
            $usuario->email = $request->get('email');
            $usuario->password = bcrypt($request->get('password'));
            
            $usuario->save();

            notify()->flash('Sus datos han sido guardados exitosamente!','success');

            return redirect("usuario/datos");  
        }
        else
        {
            notify()->flash('Las contrasenias no coinciden, por favor intente nuevamente!','error');
            return redirect("usuario/editarDatos");
        }
    }
}