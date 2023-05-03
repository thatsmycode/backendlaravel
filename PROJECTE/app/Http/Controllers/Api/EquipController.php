<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equip;


class EquipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equips = Equip::all();
        return response()->json($equips);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equip = Equip::find($id);
        if (!$equip) {
            return response()->json(['error' => 'Esdeveniment not found'], 404);
        }
        return response()->json($equip);
    }

   

   
}
