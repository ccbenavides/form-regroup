<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //
    protected $fillable = [
        'respuesta',
        'pregunta_id',
        'coordinador_id'
    ];
}
