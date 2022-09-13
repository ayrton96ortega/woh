<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = ['tipoJugador', 'vida'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function inventario(){
        return $this->hasOne('App\Models\Inventario');
    }

    public function tipoJugador(){
        return $this->belongsTo('App\Models\TipoJugador');
    }

    public function ataque(){
        return $this->belongsTo('App\Models\Ataque');
    }

    public function items(){
        return $this->morphToMany('App\Models\Item', 'itemable');
    }
}
