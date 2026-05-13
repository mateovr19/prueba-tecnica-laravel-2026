<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
     public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'fecha'       => $this->fecha_consulta,
            'motivo'      => $this->motivo,
            'diagnostico' => $this->diagnostico,
            'estado'      => $this->estado,
            'mascota'     => $this->whenLoaded('mascota', fn() => [
                'id'          => $this->mascota->id,
                'nombre'      => $this->mascota->nombre,
                'especie'     => $this->mascota->especie,
                'propietario' => $this->mascota->propietario
                    ? $this->mascota->propietario->nombre . ' ' . $this->mascota->propietario->apellido
                    : null,
            ]),
            'veterinario' => $this->whenLoaded('veterinario', fn() => [
                'id'     => $this->veterinario->id,
                'nombre' => $this->veterinario->nombre . ' ' . $this->veterinario->apellido,
            ]),
            'tratamientos' => $this->whenLoaded('tratamientos', fn() => $this->tratamientos),
        ];
    }
}
