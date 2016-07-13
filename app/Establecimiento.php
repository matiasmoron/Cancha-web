<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
	protected $table = 'establecimiento';
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'direccion', 'tienevestuario', 'id_ciudad', 'id_usuario'];
	
    public function canchas()
    {
        return $this->hasMany('App\Cancha', 'id_establecimiento');
    }
    
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad','id_ciudad');
    }
    
     public function usuario()
    {
        return $this->belongsTo('App\User','id_usuario');
    }
}
