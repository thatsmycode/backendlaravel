<?php

namespace App\Http\Controllers\Api;

use App\Models\Fita;
use App\Http\Controllers\Controller;
use App\Http\Resources\FitaResource;
use App\Models\FitaFeta;
use App\Models\Jugador;
use Illuminate\Http\Request;
class FitaController extends Controller
{
    public function index()
    {
        $fitas = Fita::all();
        return FitaResource::collection($fitas);
    }

    public function list(Request $request)
    {   
        $partida = $request->get('partida');
        $id = $request->get('id');
        try{
        
         

        $fitasfetas = FitaFeta::where('jugador_id', $id)->get();

        if (($fitasfetas->count() === 0) ) {

            return response()->json([
                'success' => false,
                'message' => 'no hi han fitas fetas',
            ], 200);
        } else {
           
        $totalfitas = Fita::where('partida_id', $partida)->get();
 
        $fitasfetaFitaIds = $fitasfetas->pluck('fita_id');

        $fetes = $totalfitas->whereIn('id', $fitasfetaFitaIds)->all();
        $nofetes = $totalfitas->whereNotIn('id', $fitasfetaFitaIds)->all();
        
        }
        return response()->json([
            'success' => true,
            'fetes' => $fetes,
            'nofetes' => $nofetes
        ], 200);          
        
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }//incloure aqui fotos de qui l'ha fet?
   
}
