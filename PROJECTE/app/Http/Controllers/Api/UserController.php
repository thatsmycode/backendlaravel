<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use APP\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
 
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:15',
        'img' => 'required|image|max:2048',
    ]);

    // delete old file
    if($user->img) {
        Storage::delete($user->img);
    }

    // save new file
    $image = $request->file('img')->store('public');
    $user->img = $image;

    // update name
    $user->name = $request->name;

    $user->save();

    return response()->json($user, 200);
}

public function show(User $user)
{
    return response()->json($user);
}

}
