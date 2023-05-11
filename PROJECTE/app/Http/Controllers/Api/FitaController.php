<?php

namespace App\Http\Controllers\Api;

use App\Models\Fita;
use App\Http\Controllers\Controller;
use App\Http\Resources\FitaResource;

class FitaController extends Controller
{
    public function index()
    {
        $fitas = Fita::all();
        return FitaResource::collection($fitas);
    }

    public function show(int $id)
    {
        try{
        $fita = Fita::find($id);
        if (!$fita) {
            return response()->json([
                'success' => false,
                'message' => 'Fita not found',
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'data' => new FitaResource($fita)
            ], 200);
        }
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
