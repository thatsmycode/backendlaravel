<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $fitafeta = new FitaFeta;
        $fitafeta->fill($request->all());
        $fitafeta->save();
        return response()->json($fitafeta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $fitafeta = FitaFeta::find($id);
        if (!$fitafeta) {
            return response()->json(['error' => 'FitaFeta not found'], 404);
        }
        return response()->json($fitafeta);
    }

  

  
}
