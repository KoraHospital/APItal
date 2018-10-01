<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Pacientes;

class Cita extends Model
{
    public $timestamps = false;

    public function paciente()
    {
        return $this->hasOne('App\Paciente');
    }

    public function consulta()
    {
        return $this->hasOne('App\Consulta');
    }
}
