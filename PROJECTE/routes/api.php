<?php

use App\Http\Controllers\API\PartidaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\MapaController;

use App\Http\Controllers\Api\EquipController;
use App\Http\Controllers\Api\FitaFetaController;
use App\Http\Controllers\Api\CombatController;

use App\Http\Controllers\Api\EsdevenimentController;
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
Route::post('/register', [TokenController::class, 'register']);//->middleware('auth:sanctum'); postman ok
Route::post('/login', [TokenController::class, 'login']);//->middleware('auth:sanctum'); postman ok


Route::apiResource('partidas', PartidaController::class); //postman ok
Route::get('/partidas/{id}', [PartidaController::class, 'show']); // comunica pero no troba partida

Route::apiResource('/mapas',  MapaController::class);
Route::get('/mapas{id}',[ MapaController::class, 'show']);

Route::apiResource('/esdeveniments',  EsdevenimentController::class);
Route::get('/esdeveniments{id}',[ EsdevenimentController::class, 'show']);

Route::apiResource('/equips',  EquipController::class);
Route::get('/equips{id}',[ EquipController::class, 'show']);

Route::apiResource('/fitas',  FitaController::class);
Route::get('/fitas{id}',[ FitaController::class, 'show']);

Route::apiResource('/fitasfetas',  FitaFetaController::class);
Route::get('/fitasfetas{id}',[ FitaFetaController::class, 'show']);

Route::apiResource('/combats',  CombatController::class);

Route::get('/combats{id}',[ CombatController::class, 'show']);
Route::put('/combats{id}',[ CombatController::class, 'update']);
Route::post('/combats{id}',[ CombatController::class, 'store']);