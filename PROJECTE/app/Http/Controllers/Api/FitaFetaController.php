<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FitaFeta;
use App\Http\Resources\FitaFetaResource;
use Illuminate\Http\Request;
 
class FitaFetaController extends Controller
{

  
    public function index()
    {
        $fitaFetas = FitaFeta::all();
        return FitaFetaResource::collection($fitaFetas);
    }

    public function store(Request $request)
    {   
                
    try{
        $jugador = $request->get('jugador');
        $fita = $request->get('fita');

        $validatedData = $request->validate([
            'jugador' => 'required|numeric',
            'fita' => 'required|numeric',
        ]);
        $fitaFeta = FitaFeta::where('fita_id', $fita)->where('jugador_id',$jugador)->first();

        if (!$fitaFeta){       
            $fitaFeta = FitaFeta::create([
                'jugador_id' => $validatedData['jugador'],
                'fita_id' => $validatedData['fita']
            ]);
            $fitaFeta->save();

            return response()->json([
                'success' => true,
                'message' => 'Fita aconseguida!',
                'data'=> $fitaFeta
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'Ja habies aconseguit aquesta fita!',
                'data'    =>  new FitaFetaResource($fitaFeta)
            ], 200);
            }
        }catch (\Exception $e) {
    
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function show( Request $request )//[POST] ruta /CHECK   --pasem id jugador x body, rebem llista de les fites fetes
    {   
        try{
            $jugador = $request->get('jugador');
            
   
            $fitaFeta = FitaFeta::where('jugador_id', $jugador)->get();

            if ($fitaFeta->count() === 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cap fita aconseguida',
            ], 404);
        }
        else{
            return response()->json([
                'success' => true,
                'data'    => FitaFetaResource::collection($fitaFeta)], 200);
            } 
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }   
}
}