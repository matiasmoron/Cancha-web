<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cancha extends Model
{
	protected $table = 'cancha';
    public $timestamps = false;
    protected $fillable = ['id_establecimiento','nombre_cancha', 'cant_jugadores', 'tiene_luz', 'techada', 'id_deporte', 'id_superficie'];
	
    public function turnosAdmin()
    {
        return $this->hasMany('App\TurnoAdmin', 'id_cancha');
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

    public function turnosPorFecha($fecha)
    {
        $dia = Carbon::createFromDate(substr($fecha,0,4),substr($fecha,5,2),substr($fecha,8,10));

        $dia = $dia->format('l');

        $dia = Dia::where('dia_ingles', '=', $dia)->first()->id;

        return $this->turnosAdmin()->where('id_dia','=',$dia); 
    }
}
