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
            'paciente_id' => $this->paciente_id,
            'fecha_hora' => $this->fecha_hora,
            'consultorio' => $this->consultorio,
            'tipo' => $this->tipo,
            'afiliacion' => $this->afiliacion
        ];
        // return parent::toArray($request);
    }
}
