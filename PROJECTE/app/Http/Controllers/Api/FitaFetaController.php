<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\Request;
use App\Models\FitaFeta;
class FitaFetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fitafeta = FitaFeta::all();
        return response()->json($fitafeta);//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $fita, int $jugador)
    {
        $fitafeta = FitaFeta::create([
            'jugador_id'  => $jugador,
            'fita_id' => $fita
        ]);

        $fitafeta->save();
        return response()->json($fitafeta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fitafeta = FitaFeta::find($id);
        if (!$fitafeta) {
            return response()->json(['error' => 'FitaFeta not found'], 404);
        }
        return response()->json($fitafeta);
    }

  

  
}
