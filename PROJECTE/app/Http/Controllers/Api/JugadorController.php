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
public function show(int $id)
{   
    try{
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
    }catch (\Exception $e) {
        
        return response()->json(['error' => $e->getMessage()], 500);
    } 
}
   
    /**
     * busca si existeix i sino tel crea.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'equip' => 'required|integer',
        ]);

        try{
         
            $user = $request->user();
            $equip = $validatedData['equip']; //mo passa per post en el body

            $jugador = Jugador::where('user_id', $user->id)
            ->where('equip_id', $equip)->first();

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
                    'message' => 'aquest es el teu jugador',
                    'data'    => new JugadorResource($jugador)
                ], 200);
                }
            }catch (\Exception $e) {
        
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

}
