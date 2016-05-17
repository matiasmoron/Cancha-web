<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurnoAdmin extends Model
{
    protected $table = 'turnoadmin';
    public $timestamps = false;
    protected $fillable = ['id_cancha','id_dia', 'horaInicio', 'horaFin', 'id_usuario_admin'];
    
    
    public function cancha()
    {
        return $this->belongsTo('App\Cancha','id_cancha');
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\User','id_usuario_admin');
    }

     public function dia()
    {
        return $this->belongsTo('App\Dia','id_dia');
    }
    
    public function scopeTurnos($query, $fecha_turno)
    {
        $query->where('fecha_inicio','=',$fecha_turno);
    }
}
