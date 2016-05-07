<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turno';
    
    
    public function cancha()
    {
        return $this->belongsTo('App\Cancha','id_cancha');
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\User','id_usuario');
    }
    
}
