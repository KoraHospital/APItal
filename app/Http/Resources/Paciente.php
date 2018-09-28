<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Paciente extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nombre' => $this->nombre,
            'apellido_materno' => $this->apellido_materno,
            'apellido_paterno' => $this->apellido_paterno,
            'tipo_sangre' => $this->tipo_sangre,
            'peso' => $this->peso,
            'telefono' => $this->telefono,
            'estatura' => $this->estatura,
            'edad' => $this->edad,
            'afiliacion' => $this->afiliacion,
            'direccion' => $this->direccion
        ];
    }
}
