<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookAccount extends Model
{
    protected $fillable = ['user_id', 'email', 'provider_user_id', 'provider'];
    public $timestamps = false;
	protected $table = 'facebookaccount';

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
