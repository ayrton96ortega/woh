<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoJugador extends Model
{
    use HasFactory;

    public function jugadors(){
        return $this->hasMany('App\Models\Jugador');
    }
}
