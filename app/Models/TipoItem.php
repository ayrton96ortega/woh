<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoItem extends Model
{
    use HasFactory;

    //relacion 1 item 1 tipo / y 1 tipo N item
    public function items(){
        return $this->hasMany('App\Model\item');
    }
}
