<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'defensa', 'ataque', 'activo'];

    //relacion 1 item 1 tipo / y 1 tipo N item
    public function tipoItem(){
        return $this->belongsTo('App\Models\TipoItem');
    }

    public function inventarios(){
        return $this->morphedByMany('App\Models\Inventario', 'itemable');
    }

    public function jugadors(){
        return $this->morphedByMany('App\Models\Jugador', 'itemable');
    }

}
