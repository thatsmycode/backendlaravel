<?php

namespace App\Http\Controllers\Api;

use App\Models\Mapa;
use App\Http\Controllers\Controller;
use App\Http\Resources\MapaResource;
class mapaController extends Controller
{
    

public function index()
{
    $mapas = Mapa::all();
    return MapaResource::collection($mapas);
}

public function show(int $id)
{
    $mapa = Mapa::find($id);
    if (!$mapa) {
        return response()->json([
            'success' => false,
            'message' => 'Mapa not found',
        ], 404);
    }else{
        return response()->json([
            'success' => true,
            'data'    => new MapaResource($mapa)
        ], 200);
    }
     
}


}
