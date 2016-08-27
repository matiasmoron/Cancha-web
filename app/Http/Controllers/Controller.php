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
use App\Establecimiento;
use App\Cancha;
use App\Dia;

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

    public function getCiudades($flag)
    {
        $ciudades = Ciudad::get();
        $arrCiudades = array();
        foreach($ciudades as $ciudad)
        {
            $arrCiudades[$ciudad->id] = $ciudad->ciudad_nombre;
        }

        if($flag === 1)
        {
            array_unshift($arrCiudades, "-");
        }
        

        return $arrCiudades;
    }

    public function getDeportes($flag)
    {
        $deportes = Deporte::get();
        $arrDeportes = array();
        foreach($deportes as $deporte)
        {
            $arrDeportes[$deporte->id] = $deporte->deporte;
        }

        if($flag === 1)
        {
            array_unshift($arrDeportes, "-");
        }

        return $arrDeportes;
    }

    public function getSuperficies($flag)
    {
        $superficies = Superficie::get();
        $arrSuperficies = array();
        foreach($superficies as $superficie)
        {
            $arrSuperficies[$superficie->id] = $superficie->superficie;
        }

        if($flag === 1)
        {
            array_unshift($arrSuperficies, "-");
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

    public function getCantJugadores($flag)
    {
        $arr = array('3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12');;
        
        if($flag === 1)
        {
            array_unshift($arr, "-");
        }

        return $arr;
    }

    public function getRank()
    {
        return array('0' => 'Mayor Estrellas', '1' => 'Mas Relevantes', '2' => 'Mas Buscadas');
    }
}
