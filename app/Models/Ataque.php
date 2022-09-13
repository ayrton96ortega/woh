<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ataque extends Model
{
    use HasFactory;

    public function jugador(){
        return $this->hasMany('App\Models\Jugador');
    }
}
