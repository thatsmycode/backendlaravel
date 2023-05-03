<?php

namespace App\Http\Controllers\Api;

use App\Models\Mapa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $mapas = Mapa::all();
        return response()->json($mapas);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $mapa = Mapa::find($id);
        if (!$mapa) {
            return response()->json(['error' => 'Mapa not found'], 404);
        }
        return response()->json($mapa);
    }

}
