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

    private $path;

    function __construct() {
       $this->path = $_SERVER['DOCUMENT_ROOT']."/Cancha-web/public/img/";
   }

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

        $estab_path = $this->path.preg_replace('[\s+]','',$request->get("nombre"));
         
        $this->validate($request, [
        'nombre' => 'required|max:50',
        'direccion' => 'required|max:100',
        'tienevestuario' => 'required|boolean',
        'id_ciudad' => 'required|exists:Ciudad,id',
        'id_usuario' => 'required|exists:Users,id'
        ]);
         
        if(!file_exists($estab_path))
        {
            mkdir($estab_path, 0777, true);
        }

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
        $estab = Establecimiento::find($request->get("id"));
        $req_nombre = $request->get('nombre');
       
        $this->validate($request, [
        'nombre' => 'required|max:50',
        'direccion' => 'required|max:100',
        'tienevestuario' => 'required|boolean',
        'id_ciudad' => 'required|exists:Ciudad,id'       
        ]);
         
        if(strcmp($estab->nombre , $req_nombre) !== 0)
        {
            rename($this->path.preg_replace('[\s+]','', $estab->nombre), 
                    $this->path.preg_replace('[\s+]','', $req_nombre));
        }

        $establecimiento->nombre = $req_nombre;
        $establecimiento->direccion = $request->get('direccion');
        $establecimiento->tienevestuario = $request->get('tienevestuario'); 
        $establecimiento->id_ciudad = $request->get('id_ciudad');
        $establecimiento->save();     

        return redirect('admin/establecimiento');
    }

    public function eliminarEstablecimiento(Request $request)
    {
        $estab = Establecimiento::find($request->get('id_establecimiento'));

        try
        {
            $estab->delete();

            $estab_path = $this->path.preg_replace('[\s+]','', $estab->nombre);
            if(file_exists($estab_path))
            {
                rmdir($estab_path);
            }

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
        $estab_nombre = preg_replace('[\s+]','', Establecimiento::find($request->get("id_establecimiento"))->nombre);
        $req_nombre_cancha = preg_replace('[\s+]','', $request->get("nombre_cancha"));
        $cancha_path = $this->path.$estab_nombre."/".$req_nombre_cancha;

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

        if(!file_exists($cancha_path))
        {
            mkdir($cancha_path, 0777, true);
        }

        $this->addFiles($request, $estab_nombre, $req_nombre_cancha);

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

        $estab_nombre_nuevo = preg_replace('[\s+]','', 
                                    Establecimiento::find($request->get("id_establecimiento"))->nombre);
        $estab_nombre_viejo = preg_replace('[\s+]','', 
                                    Establecimiento::find($cancha->id_establecimiento)->nombre);
        $req_nombre_cancha = preg_replace('[\s+]','', 
                                    $request->get('nombre_cancha'));
        $cancha_nombre = preg_replace('[\s+]','', 
                                    $cancha->nombre_cancha);

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

        if(strcmp($cancha_nombre, $req_nombre_cancha) !== 0 
            && strcmp($estab_nombre_nuevo, $estab_nombre_viejo) !== 0)
        {
            rename($this->path.$estab_nombre_viejo."/".$cancha->nombre_cancha, 
                    $this->path.$estab_nombre_nuevo."/".$req_nombre_cancha);
            $this->addFiles($resquest, $estab_nombre_nuevo, $req_nombre_cancha);
        }
        else
        {
            if(strcmp($cancha_nombre, $req_nombre_cancha) !== 0)
            {
                $this->deleteFiles($request, $estab_nombre_nuevo, $cancha_nombre, $cancha_nombre);
                rename($this->path.$estab_nombre_nuevo."/".$cancha_nombre, 
                        $this->path.$estab_nombre_nuevo."/".$req_nombre_cancha);
                $this->addFiles($request, $estab_nombre_nuevo, $req_nombre_cancha);
            }
            else
            { 
                rename($this->path.$estab_nombre_viejo, 
                        $this->path.$estab_nombre_nuevo);
                $this->addFiles($request, $estab_nombre_nuevo, $req_nombre_cancha);  
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
        $cancha_nombre = preg_replace('[\s+]','', $cancha->nombre_cancha);
        $estab_nombre = preg_replace('[\s+]','', Establecimiento::find($cancha->id_establecimiento)->nombre);

        try
        {
            $cancha->delete();
            $this->deleteAllFiles($estab_nombre, $cancha_nombre, $cancha_nombre);
            rmdir($this->path.$estab_nombre."/".$cancha_nombre);
            notify()->flash('Tu cancha ha sido eliminado con exito! Yeep!','success');
        }
        catch(\Exception $e)
        {
            notify()->flash('No hemos podido eliminar tu cancha! :( \n Recuerda que no puedes eliminar una cancha si tiene turnos asociada!','error');
        }
        return redirect('admin/cancha');
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

        TurnoAdmin::create($request->all());
         
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

    public function getUsuario()
    {
        return response()->json(Auth::user());
    }


    //Sección de metodos privados

    private function addFiles(Request $request, $nombre_estab, $nombre_cancha)
    {
        if(!is_null($request->file('imgCancha1'))) {
            \Storage::disk('local')
                ->put($nombre_estab."/".$nombre_cancha."/".$nombre_cancha.'1.jpg', \File::get($request->file('imgCancha1')));
        }
        if(!is_null($request->file('imgCancha2'))) {
            \Storage::disk('local')
                ->put($nombre_estab."/".$nombre_cancha."/".$nombre_cancha.'2.jpg', \File::get($request->file('imgCancha2')));
        }
        if(!is_null($request->file('imgCancha3'))) {
            \Storage::disk('local')
                ->put($nombre_estab."/".$nombre_cancha."/".$nombre_cancha.'3.jpg', \File::get($request->file('imgCancha3')));
        }
    }

    private function deleteFiles(Request $request, $estab_nombre, $cancha_nombre, $file_name)
    {
        if(!is_null($request->file("imgCancha1"))) {
            unlink($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."1.jpg");
        }
        if(!is_null($request->file("imgCancha2"))) {
            unlink($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."2.jpg");
        }
        if(!is_null($request->file("imgCancha3"))) {
            unlink($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."3.jpg");
        }
    }

    private function deleteAllFiles($estab_nombre, $cancha_nombre, $file_name)
    {
        if(file_exists($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."1.jpg")) {
            unlink($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."1.jpg");
        }
        if (file_exists($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."2.jpg")) {
            unlink($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."2.jpg");
        }
        if (file_exists($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."3.jpg")) {
            unlink($this->path.$estab_nombre."/".$cancha_nombre."/".$file_name."3.jpg");
        }     
    }
}