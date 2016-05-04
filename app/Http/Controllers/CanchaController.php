<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cancha;

use App\Establecimiento;

class CanchaController extends Controller
{
	
    public function todas()
	{
		/*
		$establecimientos = Establecimiento::all();
		
		foreach($establecimientos as $establecimiento)
		{
			$establecimiento->cancha = $establecimiento->canchas;
		}
		
		dd($establecimientos);
		*/
		
		$canchas = Cancha::get();
		//dd($canchas);
		return view('canchas.todas', ['cancha' => $canchas]);
	}
}
