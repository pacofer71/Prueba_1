<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    public function marcas(){
        return $this->belongsTo('App\Marca')->whithDefault([
            'nombre'=>'Sin Marca Asignada'
        ]);
    }
}
