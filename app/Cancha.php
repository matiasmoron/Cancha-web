<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
	protected $table = 'cancha';
	
    public function turnos()
    {
        return $this->hasMany('App\Turno');
    }
	
	public function tipo_canchas()
    {
        return $this->hasMany('App\Tipo_Cancha');
    }
	
	public function establecimiento()
    {
<<<<<<< HEAD
        return $this->belongsTo('App\Establecimiento','id_establecimiento');
=======
        return $this->belongsTo('App\Establecimiento','id');
>>>>>>> origin/master
    }
}
