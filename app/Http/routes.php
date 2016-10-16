<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();

Route::get('/', 'HomeController@index');

//administracion de establecimiento



//administracion de canchas
Route::get('turnos/todos', 
    [
	'middleware' => 'auth',
	'uses' => 'TurnoAdminController@turnosBusqueda']
	);
	
//Rutas para Facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

//Rutas para Turnos
Route::get('usuarios/turnos', 
	'TurnoUsuarioController@misturnos');

Route::get('turnos/cancha/{id}',
    ['as' => 'turnos.cancha', 
     'uses' => 'TurnoUsuarioController@turnoscancha']       
	);

Route::get('turno/reserva/{id_turnoAdmin}/{dia}/{horaInicio}/{horaFin}', 
    ['as' => 'turnos.reserva',
    'uses' => 'TurnoUsuarioController@buscarTurno']
    );

Route::post('turno/reservar', 
    ['as' => 'turno.reservar',
    'uses' => 'TurnoUsuarioController@reservarTurno']
    );

Route::post('turno/reservar/previsualizar', 
    ['as' => 'turno.reservar',
    'uses' => 'TurnoUsuarioController@previsualizarTurno']
    );

Route::delete('turno/eliminar', 
    ['as' => 'turno.eliminar',
    'uses' => 'TurnoUsuarioController@eliminarTurno']
    );

//Ruta de admin
Route::get('admin/home', 
	'UserController@adminhome');

    //Rutas Admin/Establecimiento
    Route::get('admin/establecimiento', 
        'UserController@verestablecimiento');

    Route::get('admin/establecimiento/nuevo', 
        'UserController@establecimientocrear');

    Route::post('admin/establecimiento/nuevo',
        ['as' => 'admin.establecimiento.nuevo',
         'uses' => 'UserController@establecimientoalmacenar']
        );

    Route::get('admin/establecimiento/{id}',
        ['as' => 'admin.establecimiento.editar', 
        'uses' => 'UserController@editarEstablecimiento']       
        );

    Route::post('admin/establecimiento',
        ['as' => 'admin.establecimiento.modificar', 
        'uses' => 'UserController@modificarEstablecimiento']       
        );

    Route::delete('admin/establecimiento',
        ['as' => 'admin.establecimiento.eliminar', 
        'uses' => 'UserController@eliminarEstablecimiento']       
        );


    //Rutas Admin/Cancha
    Route::get('admin/cancha', 
        'UserController@verCancha');

    Route::get('admin/cancha/nueva', 
        'UserController@canchaCrear');

    Route::post('admin/cancha/nueva',
        ['as' => 'admin.cancha.nueva',
         'uses' => 'UserController@canchaAlmacenar']
        );

    Route::get('admin/cancha/{id}',
        ['as' => 'admin.cancha.editar', 
        'uses' => 'UserController@editarCancha']       
        );

    Route::post('admin/cancha/{id}',
        ['as' => 'admin.cancha.modificar', 
        'uses' => 'UserController@modificarCancha']       
        );

    Route::delete('admin/cancha',
        ['as' => 'admin.cancha.eliminar', 
        'uses' => 'UserController@eliminarCancha']       
        );

    //Rutas Admin/Turnos
    Route::get('admin/turnos', 
        'UserController@verTurnosAdmin');

    Route::get('admin/turno/nuevo', 
        'UserController@turnoAdminCrear');

    Route::post('admin/turno/nuevo',
        'UserController@turnoAdminAlmacenar');

    Route::get('admin/turno',
    ['as' => 'admin.turno', 
     'uses' => 'UserController@editarTurnoAdmin']       
    );

    Route::post('admin/turno',
    ['as' => 'admin.turno', 
     'uses' => 'UserController@modificarTurnoAdmin']       
    );

    Route::delete('admin/turno',
    ['as' => 'admin.turno', 
     'uses' => 'UserController@eliminarTurnoAdmin']       
    );

    Route::post('admin/fijarTurno',
    ['as' => 'admin.fijarTurno', 
     'uses' => 'UserController@fijarTurnoAdmin']       
    );

    Route::post('admin/habilitarTurno',
    ['as' => 'admin.habilitarTurno', 
     'uses' => 'UserController@habilitarTurnoAdmin']       
    );


Route::get('inicio','InicioController@inicio');

//Ruta para Email
Route::get('send', ['as' => 'send', 'uses' => 'MailController@send'] );

//Rutas User/Datos
Route::get('usuario/datos', 
    'UserController@verDatos');

Route::get('usuario/editarDatos',
    ['as' => 'usuario.editarDatos',
    'uses' => 'UserController@editarDatos']
    );

Route::post('usuario/guardarDatos',
    ['as' => 'usuario.guardarDatos',
    'uses' => 'UserController@guardarDatos']
    );

