<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Consulta extends JsonResource
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
            'cita_id' => $this->cita_id,
            'personal_id' => $this->personal_id,
            'medicamento_id' => $this->medicamentos_id
        ];
    }
}
