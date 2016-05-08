<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
	protected $table = 'establecimiento';
	
    public function canchas()
    {
        return $this->hasMany('App\Cancha','id_establecimiento');
    }
    
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad','id_ciudad');
    }
}
