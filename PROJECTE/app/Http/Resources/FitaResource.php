<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FitaResource extends JsonResource
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
            'lat' => $this->lat,
            'long' => $this->long,
            'partida_id' => $this->partida_id,
            'tipus_id' => $this->tipus_id,
        ];
    }
}
