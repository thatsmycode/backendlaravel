<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equip;


class EquipController extends Controller
{
    public function index()
    {   
    try{
        $equips = Equip::all();
        if (!$equips) {
            return response()->json([
                'success' => false,
                'message' => 'Equips not found',
            ], 404);
        }else{
        return response()->json([
            'success' => true,
            'data'    => $equips
        ], 200);
        }
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
    
    /**
     * Display a listing of the resource.
     */
    public function list(int $partida)
    {
        try{
        $equips = Equip::where('partida_id',$partida )->get();
       
        if (!$equips) {
        return response()->json([
            'success' => false,
            'message' => 'Equips not found',
        ], 404);
        }else{
            return response()->json([
                'success' => true,
                'data'    => $equips
            ], 200);
        }
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try{
            $equip = Equip::find($id);
            if (!$equip) {
                return response()->json(['error' => 'Equip not found'], 404);
            }
            return response()->json($equip);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);    
        }
    }



   
}
