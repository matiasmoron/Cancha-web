<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
//
use App\Ciudad;

class InicioController extends Controller
{
    
    public function inicio(){

        $ciudades = Ciudad::all();
        
        
       return view('inicio', ['ciudades'=> $ciudades]);
    }
}
