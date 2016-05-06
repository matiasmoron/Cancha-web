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
		
<<<<<<< HEAD
		$canchas = Cancha::with('establecimiento')->get();

		return view('canchas.todas', ['canchas' => $canchas]);
=======
		$canchas = Cancha::get();
		//dd($canchas);
		return view('canchas.todas', ['cancha' => $canchas]);
>>>>>>> origin/master
	}
}
