<?php

use App\Http\Controllers\Api\PartidaController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\MapaController;
use App\Http\Controllers\Api\FitaController;
use App\Http\Controllers\Api\EquipController;
use App\Http\Controllers\Api\FitaFetaController;
use App\Http\Controllers\Api\CombatController;
use App\Http\Controllers\Api\JugadorController;
//comentari per comprovar una cosa

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user', [TokenController::class, 'user'])->middleware('auth:sanctum');  
Route::post('/register', [TokenController::class, 'register']);
Route::post('/login', [TokenController::class, 'login']);
Route::post('/logout', [TokenController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'role:jugador'])->group(function () {

    Route::apiResource('/partidas', PartidaController::class); 
    Route::get('/partidas/{id}', [PartidaController::class, 'show']); 

    Route::apiResource('/mapas',  MapaController::class);
   
    Route::apiResource('/equips',  EquipController::class);
    
    Route::get('/equips/list/{id}',[ EquipController::class, 'list']);
    

    Route::apiResource('/fitas',  FitaController::class);

    Route::get('/fitas/list/{partida}/{id}' , [FitaController::class, 'list']);

    Route::apiResource('/fitasfetas',  FitaFetaController::class);
 
    Route::post('/fitasfetas/check', [ FitaFetaController::class, 'show']);//si jugador la te feta re sino la fa

    Route::apiResource('/combats',  CombatController::class);

    Route::get('/combats/{id}',[ CombatController::class, 'show']); 
   
    Route::apiResource('/jugadors',  JugadorController::class);  

    Route::ApiResource('/users', UserController::class);
});