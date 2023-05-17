<?php

namespace App\Http\Controllers\Api;

use App\Models\Fita;
use App\Http\Controllers\Controller;
use App\Models\FitaFeta;
use App\Models\Jugador;
use Illuminate\Http\Request;

class FitaController extends Controller
{
    public function show(int $idpartida){
        try{
        $fitespartida = Fita::where('partida_id', $idpartida)->get();
        $llistafotos = [];
        
        foreach ($fitespartida as $cadauna) {
            $fitespartidafetes = FitaFeta::where('fita_id', $cadauna->id)->get();
        
            if (!isset($llistafotos[$cadauna->id])) {
                $llistafotos[$cadauna->id] = [];
            }
        
            foreach ($fitespartidafetes as $fitaFeta) {
                $jugador = Jugador::find($fitaFeta->jugador_id);
                $user = $jugador->user;
                $llistafotos[$cadauna->id][] = $user->img;
            }
        }
        
        return response()->json([
            'success' => true,
            'data' => $llistafotos,
        ], 200);
    }catch (\Exception $e){
        return response()->json(['error' => $e->getMessage()], 500);
    }

}

    public function list(int $partida , int $id)    //(Request $request)
    {   
        try{

        $fitasfetas = FitaFeta::where('jugador_id', $id)->get();

       
           
        $totalfitas = Fita::where('partida_id', $partida)->get();
 
        $fitasfetaFitaIds = $fitasfetas->pluck('fita_id');

        $fetes = $totalfitas->whereIn('id', $fitasfetaFitaIds)->all();
        $nofetes = $totalfitas->whereNotIn('id', $fitasfetaFitaIds)->all();

        $fetes = array_values($fetes);
        $nofetes = array_values($nofetes);
        
        return response()->json([
            'success' => true,
            'fetes' => $fetes,
            'nofetes' => $nofetes
        ], 200);          
        
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
   
}
