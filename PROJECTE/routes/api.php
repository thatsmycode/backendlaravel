<?php

use App\Http\Controllers\Api\PartidaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\MapaController;
use App\Http\Controllers\Api\FitaController;
use App\Http\Controllers\Api\EquipController;
use App\Http\Controllers\Api\FitaFetaController;
use App\Http\Controllers\Api\CombatController;
use App\Http\Controllers\Api\JugadorController;
use \Spatie\Permission\Middlewares\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user', [TokenController::class, 'user'])->middleware('auth:sanctum');  
Route::post('/register', [TokenController::class, 'register']);
Route::post('/login', [TokenController::class, 'login']);
Route::post('/logout', [TokenController::class, 'logout'])->middleware('auth:sanctum');

//Route::middleware(['auth:sanctum', 'role:jugador'])->group(function () {

    Route::apiResource('/partidas', PartidaController::class)->middleware(['auth:sanctum','role:jugador']); 
    Route::get('/partidas/{id}', [PartidaController::class, 'show'])->middleware('auth:sanctum'); 

    Route::apiResource('/mapas',  MapaController::class)->middleware('auth:sanctum');
   
    Route::apiResource('/equips',  EquipController::class);
    Route::get('/equips/{id}',[ EquipController::class, 'show'])->middleware('auth:sanctum');
    Route::get('/equips/list/{id}',[ EquipController::class, 'list'])->middleware('auth:sanctum');
    Route::put('/equips/{id}/{punts}',[ EquipController::class, 'update'])->middleware('auth:sanctum');

    Route::apiResource('/fitas',  FitaController::class)->middleware('auth:sanctum');

    Route::apiResource('/fitasfetas',  FitaFetaController::class);
 
    Route::post('/fitasfetas/check',[ FitaFetaController::class, 'show']);//si jugador la te feta re sino la fa

    Route::apiResource('/combats',  CombatController::class);

    Route::get('/combats/{id}',[ CombatController::class, 'show']); 
   
    Route::apiResource('/jugadors',  JugadorController::class); 
    
   

    
//});