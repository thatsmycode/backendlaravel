<?php

namespace App\Http\Controllers\Api;
use App\Models\TipusEsdeveniment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tipus_esdevenimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipus = TipusEsdeveniment::all();
        return response()->json($tipus);
    }

    public function show(int $id)
    {
        
        $tipus = TipusEsdeveniment::find($id);
        if (!$tipus) {
            return response()->json(['error' => 'TipusEsdeveniment not found'], 404);
        }
        return response()->json($tipus);
    }

   

  
  
}
