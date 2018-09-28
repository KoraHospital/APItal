<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    public $timestamps = false;

    public function medicamento()
    {
        return $this->hasMany('App\Medicamento');
    }
}
