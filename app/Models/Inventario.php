<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    public function jugador(){
        return $this->belongsTo('App\Models\Jugador');
    }

    public function inventarios(){
        return $this->morphToMany('App\Models\Item', 'itemable');
    }
}
