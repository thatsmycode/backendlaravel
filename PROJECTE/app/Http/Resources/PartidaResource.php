<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartidaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'poblacio' => $this->poblacio,
            'duracio' => $this->duracio,
            'puntsVictoria'=> $this->puntsVictoria,
            'mapa_id' => $this->mapa_id,
        ];
    }
}
