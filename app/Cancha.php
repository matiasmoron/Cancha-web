<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
	protected $table = 'cancha';
    public $timestamps = false;
    protected $fillable = ['id_establecimiento','nombre_cancha', 'cant_jugadores', 'tiene_luz', 'techada', 'id_deporte', 'id_superficie'];
	
    public function turnos()
    {
        return $this->hasMany('App\TurnoAdmin');
    }
	
	public function superficie()
    {
        return $this->belongsTo('App\Superficie', 'id_superficie');
    }
	
	public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento','id_establecimiento');
    }
    
    public function deporte()
    {
        return $this->belongsTo('App\Deporte', 'id_deporte');
    }
    
    public function scopeCanchas($query, $cantjugadores, $superficie, $deporte)
    {
        $query->where('cant_jugadores', $cantjugadores)->where('id_superficie',$superficie)->where('id_deporte', $deporte);
    }
}
