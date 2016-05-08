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
	
	public function superficie()
    {
        return $this->belongsTo('App\Superficie', 'id_superficie');
    }
	
	public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento','id_establecimiento');
    }
    
    public function scopeCanchas($query, $cantjugadores, $superficie)
    {
        $query->where('cant_jugadores', $cantjugadores)->where('id_superficie',$superficie);
    }
}
