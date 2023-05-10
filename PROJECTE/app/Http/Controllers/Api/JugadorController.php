<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Http\Resources\JugadorResource;
use App\Models\User;
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
public function show(int $id)
{ 
    $jugador=Jugador::find($id);
    if (!$jugador) {
        return response()->json([
            'success' => false,
            'message' => 'Jugador not found'
        ], 200);
    }else{
        return response()->json([
            'success' => true,
            'data'    => new JugadorResource($jugador)
        ], 200);
}
}
    /**
     * Display the specified resource.
     */
   /* public function list (int $equip)// comprova si tens un jugador en aquell equip
    {       
        $jugador = Jugador::where('equip_id', $equip)->first();
        //where('user_id', $user );//->where('equip_id', $equip)->first();

        if (!$jugador) {

          
            return response()->json([
                'success' => false,
                'message' => 'has de crearte un jugador'
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'data'    => new JugadorResource($jugador)
            ], 200);
        }   
    }*/
   
    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
       //incloure el si esta o no aki dins (del ekip), jo li tornare la info del jugador si o si, si no el troba el crea, si el troba li dona aket.
        $user = $request->user();
                $equip= $request->get('equip');//mo passa per post en el body

        $jugador = Jugador::where('user_id', $user)->where('equip_id', $equip)->first();

        if (!$jugador) {

            $newjug = Jugador::create([
                'user_id' => $user->id,
                'soldadets' => 0,
                'equip_id' => $equip,
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'creat jugador',
                'data'=> new JugadorResource($newjug)
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'data'    => new JugadorResource($jugador)
            ], 200);
        }
    }

}
