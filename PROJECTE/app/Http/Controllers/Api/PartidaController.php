<?php

namespace App\Http\Controllers\API;

use App\Models\Partida;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $partides = Partida::all();
        return response()->json($partides);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $partida = Partida::find($id);
        if (!$partida) {
            return response()->json(['error' => 'Partida not found'], 404);
        }
        return response()->json($partida);
    }



}

