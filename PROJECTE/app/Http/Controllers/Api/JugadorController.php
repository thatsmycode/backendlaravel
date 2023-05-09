<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Http\Resources\JugadorResource;

class jugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jugadors = Jugador::all();
        return JugadorResource::collection($jugadors);
    
    }

   
    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $equip)
    {
        $jugador = Jugador::where('user_id', $request->user())->where('equip_id', $equip)
        ->first();
        if (!$jugador) {

            $newjug = Jugador::create([
                'user_id' => $request->user(),
                'soldadets' => 0,
                'equip_id' => $equip,
            ]);
            return response()->json([
                'success' => true,
                'data' => $newjug,
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'data'    => new JugadorResource($jugador)
            ], 200);
        }
         
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

}
