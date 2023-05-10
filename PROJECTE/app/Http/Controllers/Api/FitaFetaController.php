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
    
    public function show(string $id1 )
    {   
        //auth agafar userid, comprovar si la posicio k menvia, esta a 10 m del centre dalguna fita, fer un loop
        $fitaFeta = FitaFeta::where('jugador_id', $id1)->get();
        if (!$fitaFeta) {
            return response()->json([
                'success' => false,
                'message' => 'Partida not found',
            ], 404);
        }
        else{
            return response()->json([
                'success' => true,
                'data'    => FitaFetaResource::collection($fitaFeta)], 200);
            }    
}
}