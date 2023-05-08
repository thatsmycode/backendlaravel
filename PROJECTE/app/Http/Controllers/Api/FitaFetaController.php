<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FitaFeta;
use App\Http\Resources\FitaFetaResource;
use Illuminate\Http\Request;
 
class FitaFetaController extends Controller
{

  
    public function index()
    {
        $fitaFetas = FitaFeta::all();
        return FitaFetaResource::collection($fitaFetas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jugador_id' => 'required|numeric',
            'fita_id' => 'required|numeric',
        ]);
    
        $fitaFeta = FitaFeta::create([
            'jugador_id' => $validatedData['jugador_id'],
            'fita_id' => $validatedData['fita_id']
        ]);
    
        $fitaFeta->save();
        return new FitaFetaResource($fitaFeta);
    }
    
    public function show(string $id)
    {
        $fitaFeta = FitaFeta::find($id);
        if (!$fitaFeta) {
            return response()->json(['error' => 'FitaFeta not found'], 404);
        }
        return new FitaFetaResource($fitaFeta);
    }
}
