<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Medicamento extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'nombre' => $this->nombre,
            'cantidad' => $this->cantidad,
            'aplicacion' => $this->aplicacion,
            'edad_aplicacion' => $this->edad_aplicacion,
            'fabricante' => $this->fabricante
        ];
    }
}
