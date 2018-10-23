<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    //
    protected $fillable = [
        'NOMBRES',
        'TARCODIGO',
        'TARSALDOS',
        'ALUESTADO',
    ];
    protected $table = "saldos";
    public $timestamps = false;
}
