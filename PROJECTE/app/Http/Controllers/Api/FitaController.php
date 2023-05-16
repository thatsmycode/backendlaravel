<?php

namespace App\Http\Controllers\Api;

use App\Models\Fita;
use App\Http\Controllers\Controller;
use App\Http\Resources\FitaResource;
use App\Models\FitaFeta;
use App\Models\Jugador;
use Illuminate\Http\Request;
use App\Models\User;
class FitaController extends Controller
{
    public function show(int $idpartida){// id fita
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
        

/*
    try{
        $fotos = [];
        $fita = Fita::find($idfita); // FITA EN CONCRET
        $feta = FitaFeta::where('fita_id', $fita->id)->get();//totes les fites fetes de la fita en concret
        
        if ($feta){

        $jugadorIds = $feta->pluck('jugador_id'); // llista jugadors_ids de la fitafeta      
        $jugadors = Jugador::whereIn('id', $jugadorIds)->get();
        
        foreach ($jugadors as $jugador){
            $user = User::find($jugador->user_id);
            $foto = $user->img;
            $fotos[] = $foto;
        }      
    
        return response()->json([
                'success' => true,
                'data' => $fotos,
                 
        ], 200); 
    }else{
        return response()->json([
            'success' => false,
            'data' => 'no hi han imatges per aquesta fita',
             
    ], 200);
    } 
    }catch (\Exception $e){
        return response()->json(['error' => $e->getMessage()], 500);
    }*/
}

    public function list(Request $request)
    {   
        $validatedData = $request->validate([
            'partida' => 'required|integer',
            'id' => 'required | integer'
        ]);

        $partida = $validatedData['partida'];
        $id = $validatedData['id'];
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

        $fetes = array_values($fetes);
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
   
//public function checklocation(Request $request){ //x si no va be fero a frontend
//$position= $request->get('position');

 


 


}
