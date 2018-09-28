<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Personal extends JsonResource
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
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'rol' => $this->rol,
            'turno' => $this->turno,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion
        ];
    }
}
