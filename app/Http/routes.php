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

Route::get('canchas/busqueda', [
	'middleware' => 'auth',
	'uses' => 'CanchaController@busqueda']
	);
	
//Rutas para Facebook

Route::get('auth/facebook', 
	'Auth\AuthController@redirectToProvider');

Route::get('auth/facebook/callback', 
	'Auth\AuthController@handleProviderCallback');

//Rutas para Turnos
Route::get('usuarios/turnos', 
	'TurnoController@misturnos');

Route::get('turnos/cancha/{id}',
    ['as' => 'turnos.cancha', 
     'uses' => 'TurnoController@turnoscancha']       
	);
