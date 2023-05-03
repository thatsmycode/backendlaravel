<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fita;

class FitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $fita = Fita::all();
        return response()->json($fita);//
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fita = Fita::find($id);
        if (!$fita) {
            return response()->json(['error' => 'Fita not found'], 404);
        }
        return response()->json($fita);
    }



}
