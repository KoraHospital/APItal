<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cita extends JsonResource
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
            'id_paciente' => $this->id_paciente,
            'fecha_hora' => $this->fecha_hora,
            'consultorio' => $this->consultorio,
            'tipo' => $this->tipo,
            'afiliacion' => $this->afiliacion
        ];
    }
}
