<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable=['nombre', 'imagen'];
    public function coches(){
        return $this->hasMany('App\Coche');
    }
}
