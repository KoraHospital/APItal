<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    public function consulta()
    {
        return $this->hasOne('App\Consulta');
    }
}
