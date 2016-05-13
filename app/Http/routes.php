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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//administracion de establecimiento



//administracion de canchas
Route::get('canchas/busqueda', 
    [
	'middleware' => 'auth',
	'uses' => 'CanchaController@busqueda'
    ]
	);
	
//Rutas para Facebook
Route::get('auth/facebook', 
	'Auth\AuthController@redirectToProvider');

Route::get('auth/facebook/callback', 
	'Auth\AuthController@handleProviderCallback');

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

Route::post('turno/reserva/{id_turnoAdmin}/{dia}/{horaInicio}/{horaFin}', 
    ['as' => 'turnos.reserva',
    'uses' => 'TurnoUsuarioController@guardarTurno']
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

    Route::post('admin/establecimiento/{id}',
        ['as' => 'admin.establecimiento.modificar', 
        'uses' => 'UserController@modificarEstablecimiento']       
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

    //Rutas Admin/Datos
    Route::get('admin/datos', 
        'UserController@verDatos');

    //Rutas Admin/Turnos
    Route::get('admin/turnos', 
        'UserController@verTurnosAdmin');

    Route::get('admin/turno/nuevo', 
        'UserController@turnoAdminCrear');

    Route::post('admin/turno/nuevo',
        'UserController@turnoAdminAlmacenar');

    Route::get('admin/turno/{id}',
    ['as' => 'admin.turno', 
     'uses' => 'UserController@editarTurnoAdmin']       
    );

    Route::post('admin/turno/{id}',
    ['as' => 'admin.turno', 
     'uses' => 'UserController@modificarTurnoAdmin']       
    );


Route::get('inicio','InicioController@inicio');