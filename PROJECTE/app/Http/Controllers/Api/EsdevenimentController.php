<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Esdeveniment;


class EsdevenimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $esdv = Esdeveniment::all();
        return response()->json($esdv);
    }

   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $esdv = Esdeveniment::find($id);
        if (!$esdv) {
            return response()->json(['error' => 'Esdeveniment not found'], 404);
        }
        return response()->json($esdv);
    }

    /**
     * Update the specified resource in storage.
     */
   // public function update(Request $request, string $id)
   // {
        //
   // }

    /**
     * Remove the specified resource from storage.
     */
  //  public function destroy(string $id)
  // {
        //
   // }
}
