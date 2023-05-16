<?php

namespace App\Http\Controllers\API;

use App\Models\Partida;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartidaResource;

class PartidaController extends Controller
{
    public function index()
{
    $partidas = Partida::all();
    return PartidaResource::collection($partidas);
}

public function show(int $id)
{
    
    $partida = Partida::find($id);
    if (!$partida) {
        return response()->json([
            'success' => false,
            'message' => 'Partida not found',
        ], 404);
    }else{
        return response()->json([
            'success' => true,
            'data'    => new PartidaResource($partida)
        ], 200);
    }
     
}
}