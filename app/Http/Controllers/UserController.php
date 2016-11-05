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
        'nombre' => 'required|max:50',
        'direccion' => 'required|max:100',
        'tienevestuario' => 'required|boolean',
        'id_ciudad' => 'required|exists:Ciudad,id',
        'id_usuario' => 'required|exists:Users,id'
        ]);
         
        Establecimiento::create($request->all());
         
        return redirect('admin/establecimiento');
    }

    public function editarEstablecimiento($id)
    {
        $establecimiento = Establecimiento::find($id);

        return view('admin.editarEstablecimiento', ['establecimiento' => $establecimiento, 'arrCiudades' => $this->getCiudades(1)]);
    }

    public function modificarEstablecimiento(Request $request)
    {
        $establecimiento = Establecimiento::find($request->get("id"));
       
        $this->validate($request, [
        'nombre' => 'required|max:50',
        'direccion' => 'required|max:100',
        'tienevestuario' => 'required|boolean',
        'id_ciudad' => 'required|exists:Ciudad,id'       
        ]);
         
        if(strcmp($establecimiento->nombre , $request->get('nombre')) !== 0)
        {
            rename($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$establecimiento->nombre, $_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$request->get('nombre'));
        }

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
        'id_establecimiento' => 'required|exists:Establecimiento,id',
        'nombre_cancha' => 'required|max:50',
        'cant_jugadores' => 'required|min:1',
        'tiene_luz' => 'required|boolean',
        'techada' => 'required|boolean',
        'id_deporte' => 'required|exists:Deporte,id',
        'id_superficie' => 'required|exists:Superficie,id',
        'imgCancha1' => 'required|image'
        ]);

        $nombre_estab = Establecimiento::find($request->get("id_establecimiento"))->nombre;

        $path = $_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab."/".$request->get("nombre_cancha");

        if(!file_exists($path))
        {
            mkdir($path, 0777, true);
        }

        $this->addFiles($request, $nombre_estab, $request->get("nombre_cancha"));

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

        $this->validate($request, [
        'id_establecimiento' => 'required|exists:Establecimiento,id',
        'nombre_cancha' => 'required|max:50',
        'cant_jugadores' => 'required|min:1',
        'tiene_luz' => 'required|boolean',
        'techada' => 'required|boolean',
        'id_deporte' => 'required|exists:Deporte,id',
        'id_superficie' => 'required|exists:Superficie,id',
        'imgCancha1' => 'required|image'
        ]);

        $nombre_estab_nuevo = Establecimiento::find($request->get("id_establecimiento"))->nombre;
        $nombre_estab_viejo = Establecimiento::find($cancha->id_establecimiento)->nombre;

        if(strcmp($cancha->nombre_cancha,$request->get('nombre_cancha')) !== 0 && strcmp($nombre_estab_nuevo , $nombre_estab_viejo) !== 0)
        {
            rename($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_viejo."/".$cancha->nombre_cancha, $_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_nuevo."/".$request->get("nombre_cancha"));
            $this->addFiles($resquest, $nombre_estab_nuevo, $request->get("nombre_cancha"));
        }
        else
        {
            if(strcmp($cancha->nombre_cancha,$request->get('nombre_cancha')) !== 0)
            {
                rename($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_nuevo."/".$cancha->nombre_cancha, $_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_nuevo."/".$request->get("nombre_cancha"));

                if(!is_null($request->file("imgCancha1")))
                {
                    unlink($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_nuevo."/".$request->get("nombre_cancha")."/".$cancha->nombre_cancha."1.jpg");
                }

                if(!is_null($request->file("imgCancha2")))
                {
                    unlink($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_nuevo."/".$request->get("nombre_cancha")."/".$cancha->nombre_cancha."2.jpg");
                }

                if(!is_null($request->file("imgCancha3")))
                {
                    unlink($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_nuevo."/".$request->get("nombre_cancha")."/".$cancha->nombre_cancha."3.jpg");
                }

                $this->addFiles($request, $nombre_estab_nuevo, $request->get("nombre_cancha"));
            }
            else
            { 
                rename($_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_viejo, $_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/".$nombre_estab_nuevo);
                $this->addFiles($request, $nombre_estab_nuevo, $request->get("nombre_cancha"));  
            }   
        }

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
        'id_cancha' => 'required|exists:Cancha,id',
        'id_dia' => 'required|exists:Dia,id',
        'horaInicio' => 'required',
        'horaFin' => 'required',
        'id_usuario_admin' => 'required|exists:Users,id',
        'precio_cancha' => 'required|numeric',
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

    public function turnoEspecialCrear()
    {
        return view('admin.nuevoTurnoEspecial', ['arrCanchas' => $this->getCanchas(), 'arrDias' => $this->getDias()]);
    }

    public function turnoEspecialAlmacenar(Request $request)
    {
         
        $this->validate($request, [
        'id_cancha' => 'required|exists:Cancha,id',
        'id_dia' => 'required|exists:Dia,id',
        'horaInicio' => 'required',
        'horaFin' => 'required',
        'id_usuario_admin' => 'required|exists:Users,id',
        'precio_cancha' => 'required|numeric',
        ]);
        
        dd($request->all());

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
         $this->validate($request, [
        'id_cancha' => 'required|exists:Cancha,id',
        'id_dia' => 'required|exists:Dia,id',
        'horaInicio' => 'required',
        'horaFin' => 'required',
        'id_usuario_admin' => 'required|exists:Users,id',
        'precio_cancha' => 'required|numeric',
        ]);
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


    public function fijarTurnoAdmin(Request $request)
    {
        $turnoAdmin = TurnoAdmin::find($request->get('id_turnoAdmin'));

        try
        {
            if($turnoAdmin->fijo === 0)
            {
                $turnoAdmin->fijo = 1;
                $turnoAdmin->habilitado = 0;
                $turnoAdmin->save();
                notify()->flash('La reserva del turno se ha fijado con exito!','success');
            }
            else
            {
                $turnoAdmin->fijo = 0;
                $turnoAdmin->habilitado = 1;
                $turnoAdmin->save();
                notify()->flash('El turno ya se libero con exito!','success');
            }
        }
        catch(\Exception $e)
        {
            notify()->flash('No hemos podido eliminar tu turno! :( \n Comprueba que no existan turnos reservados','error');
        }

        return redirect('admin/turnos');
    }

    public function habilitarTurnoAdmin(Request $request)
    {
        $turnoAdmin = TurnoAdmin::find($request->get('id_turnoAdmin'));

        try
        {
            if($turnoAdmin->habilitado === 0)
            {
                $turnoAdmin->habilitado = 1;
                $turnoAdmin->save();
                notify()->flash('La reserva del turno se ha habilitado con exito!','success');
            }
            else
            {
                $turnoAdmin->habilitado = 0;
                $turnoAdmin->save();
                notify()->flash('El turno ya se deshabilito con exito!','success');
            }
        }
        catch(\Exception $e)
        {
            notify()->flash('No hemos podido eliminar tu turno! :( \n Comprueba que no existan turnos reservados','error');
        }

        return redirect('admin/turnos');
    }

    public function ver_turnos_libres(){
    
        $turnosAdmin = TurnoAdmin::where('id_usuario_admin', Auth::user()->id)->get();

        $turnosAdmin = collect($turnosAdmin);
        $turnosAdmin = $turnosAdmin->groupBy('id_cancha');

        return view('admin.turnos_libres', ['turnosAdmin' => $turnosAdmin]);
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
            $this->validate($request, [
                    'name' => 'required|max:50',
                    'email' => 'required|Email',
                    'password'=>'required'
                    ]);
            $usuario->name = $request->get('name');
            $usuario->email = $request->get('email');
            /*$usuario->fechaNac = $request->get('fechaNac');
            $usuario->sexo = $request->get('sexo');*/
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

    private function addFiles(Request $request, $nombre_estab, $nombre_cancha)
    {
        //obtenemos el campo file definido en el formulario
        $file = $request->file('imgCancha1');
        //indicamos que queremos guardar un nuevo archivo en el disco local
        if(!is_null($file))
        {
            \Storage::disk('local')->put($nombre_estab."/".$nombre_cancha."/".$nombre_cancha.'1.jpg',  \File::get($file));
        }

        $file = $request->file('imgCancha2');
        if(!is_null($file))
        {
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre_estab."/".$nombre_cancha."/".$nombre_cancha.'2.jpg',  \File::get($file));
        }

        $file = $request->file('imgCancha3');
        if(!is_null($file))
        {
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre_estab."/".$nombre_cancha."/".$nombre_cancha.'3.jpg',  \File::get($file));
        }
    }
}