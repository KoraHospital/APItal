<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public function consulta()
    {
        return $this->hasOne('App\Consulta');
    }
}
