<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    //
    protected $fillable = [ "nombre" ];

    public function coordinadors()
    {
        return $this->hasMany('App\Coordinador');
    }

}
