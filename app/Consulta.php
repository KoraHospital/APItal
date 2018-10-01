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

    public function cita()
    {
        return $this->hasMany('App\Cita');
    }

    public function personal()
    {
        return $this->hasMany('App\Personal');
    }
}
