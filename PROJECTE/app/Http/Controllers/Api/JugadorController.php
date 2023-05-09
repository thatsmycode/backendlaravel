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
    public function filter (int $equip)
    {
        $user=Auth::id();
       
        $jugador = User::Jugador();
        //where('user_id', $user );//->where('equip_id', $equip)->first();

        if (!$jugador) {

           /* $newjug = Jugador::create([
                'user_id' => $user,
                'soldadets' => 0,
                'equip_id' => $equip,
            ]);
            */
            return response()->json([
                'success' => true,
                'data' => $user//newjug,
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
