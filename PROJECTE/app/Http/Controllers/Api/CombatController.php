<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Combat;
class CombatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combat = Combat::all();
        return response()->json($combat);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $combat = new Combat;
        $combat->fill($request->all());
        $combat->save();
        return response()->json($combat, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $combat = Combat::find($id);
        if (!$combat) {
            return response()->json(['error' => 'Combat not found'], 404);
        }
        return response()->json($combat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $soldadets) 
    {
        $combat = Combat::find($id);
    
        if (!$combat) {
            return response()->json(['error' => 'Combat not found'], 404);
        }
        $soldadets = $request->input('soldadets');

        if (!is_numeric($soldadets)) {
            return response()->json([
                'error' => 'Invalid input value for "soldadets"'
            ], 400);
        }
        if ($combat->soldadets == null){
            $combat->soldadets = 0;
        };
        $combat->soldadets += intval($soldadets);
        $combat->save();
    
        return response()->json($combat, 200);
    }


    
}
