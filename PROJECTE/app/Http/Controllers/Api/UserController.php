<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
 
public function store(Request $request)
{   
    
    try{


    $id = $request->user();

    $user = User::find($id->id);

    $request->validate([
        'name' => 'required|string|max:15',
        'img' => 'required|image|max:2048',
    ]);

    // delete old file
    if($user->img) {
        Storage::delete($user->img);       
    }

    // save new file
  //  $image = $request->file('img')->store('public');
    
   // $user->name = $request->name;
   


    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $destinationPath = base_path() . '/public/uploads/images/product/' . $fileName;
        $image->move($destinationPath, $fileName);
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
