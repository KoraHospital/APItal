<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Citas;s

class Paciente extends Model
{
    public function cita()
    {
        return $this->hasMany('App\Cita');
    }
}
