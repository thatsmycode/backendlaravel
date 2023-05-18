<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Equip;
use App\Models\Jugador;
use App\Models\Partida;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $jugadors = Jugador::where('user_id', $user->id)->with('equip.partida')->get();
        
        $jugadorsData = [];
        foreach ($jugadors as $jugador) {
            $jugadorsData[] = [
                'nom' => $user->name,
                'jugador_id' => $jugador->id,
                'equip_id' => $jugador->equip->id,
                'partida_id' => $jugador->equip->partida->id
            ];
        }
        
        return response()->json([
            'success' => true,
            'jugadors' => $jugadorsData
        ], 200);
    }
    
public function store(Request $request)
{   
    $request->validate([
        'name' => 'required|string|max:15',
        'img' => 'nullable |mimes:jpeg,jpg,png|max:2048',//jfif?
    ]);

    try{


    $id = $request->user();

    $user = User::find($id->id);

    $user->name = $request->get('name');

    // delete old file
    if($user->img) {
        Storage::delete($user->img);       
    }


    if ($request->hasFile('img')) {
        $img = $request->file('img');
        $fileName = $img->getClientOriginalName();
        $destinationPath = base_path() . '/public';// . $fileName;
        $img->move($destinationPath, $fileName);
        $user->img = $destinationPath;
        $user->save();
    }
    return response()->json($user, 200);
    }catch (\Exception $e) {
    
        return response()->json(['error' => $e->getMessage()], 500);
    }
   
    }


public function show(User $user)
{
    return response()->json($user, 200);

}

}
