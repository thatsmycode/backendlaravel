<?php

namespace App\Http\Controllers\Api;

use App\Models\Fita;
use App\Http\Controllers\Controller;
use App\Models\FitaFeta;
use App\Models\Jugador;
use Illuminate\Http\Request;

class PutaController extends Controller
{



public function list(int $partida , int $id)    //(Request $request)
    {   
        /*$validatedData = $request->validate([
            'partida' => 'required|integer',
            'id' => 'required | integer'
        ]);*/

        //$partida = $validatedData['partida'];
        //$id = $validatedData['id'];
        try{

        $fitasfetas = FitaFeta::where('jugador_id', $id)->get();

        if (($fitasfetas->count() === 0) ) {

            return response()->json([
                'success' => false,
                'message' => 'aquest jugador no te cap fita feta',
            ], 200);
        } else {
           
        $totalfitas = Fita::where('partida_id', $partida)->get();
 
        $fitasfetaFitaIds = $fitasfetas->pluck('fita_id');

        $fetes = $totalfitas->whereIn('id', $fitasfetaFitaIds)->all();
        $nofetes = $totalfitas->whereNotIn('id', $fitasfetaFitaIds)->all();

        $fetes = array_values($fetes);
        $nofetes = array_values($nofetes);
        }
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