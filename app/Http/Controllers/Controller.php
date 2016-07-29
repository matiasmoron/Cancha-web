<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Deporte;
use App\Ciudad;
use App\Superficie;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    //Funciones Auxiliares

    public function getDias()
    {
        $dias = Dia::get();
        $arrDias = array();
        foreach($dias as $dia)
        {
            $arrDias[$dia->id] = $dia->dia;
        }

        return $arrDias;
    }

    public function getCanchas()
    {
        $canchas = Cancha::get();
        $arrCanchas = array();
        foreach($canchas as $cancha)
        {
            $arrCanchas[$cancha->id] = $cancha->nombre_cancha;
        }

        return $arrCanchas;
    }

    public function getCiudades()
    {
        $ciudades = Ciudad::get();
        $arrCiudades = array();
        foreach($ciudades as $ciudad)
        {
            $arrCiudades[$ciudad->id] = $ciudad->ciudad_nombre;
        }

        return $arrCiudades;
    }

    public function getDeportes()
    {
        $deportes = Deporte::get();
        $arrDeportes = array();
        foreach($deportes as $deporte)
        {
            $arrDeportes[$deporte->id] = $deporte->deporte;
        }

        return $arrDeportes;
    }

    public function getSuperficies()
    {
        $superficies = Superficie::get();
        $arrSuperficies = array();
        foreach($superficies as $superficie)
        {
            $arrSuperficies[$superficie->id] = $superficie->superficie;
        }

        return $arrSuperficies;
    }

    public function getEstablecimientos()
    {
        $establecimientos = Establecimiento::get();
        $arrEstablecimientos = array();
        foreach($establecimientos as $establecimiento)
        {
            $arrEstablecimientos[$establecimiento->id] = $establecimiento->nombre;
        }

        return $arrEstablecimientos;
    }

    public function getCantJugadores()
    {
        return array('3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12');;
    }
}
