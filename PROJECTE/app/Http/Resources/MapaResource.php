<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MapaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'success' => true,
            'message' => 'Mapa retrieved successfully.',
            'data' => [
                'id' => $this->id,
                'nom' => $this->nom,
                'lat1' => $this->lat1,
                'long1' => $this->long1,
                'lat2' => $this->lat2,
                'long2' => $this->long2,
                
            ],
        ];
    }
}

