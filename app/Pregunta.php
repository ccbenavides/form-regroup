<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $fillable = [
        'nombre',
        'encuesta_id'
    ];    
    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }

}
