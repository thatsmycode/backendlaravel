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
use App\Http\Controllers\Api\EsdevenimentController;
use Illuminate\Support\Facades\JWTAuth;

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


Route::apiResource('/partidas', PartidaController::class); 
Route::get('/partidas/{id}', [PartidaController::class, 'show']); 

Route::apiResource('/mapas',  MapaController::class);
Route::get('/mapas/{id}',[ MapaController::class, 'show']);

Route::apiResource('/equips',  EquipController::class);
Route::get('/equips/{id}',[ EquipController::class, 'show']);
Route::get('/equips/list/{id}',[ EquipController::class, 'list']);
Route::put('/equips/{id}/{punts}',[ EquipController::class, 'update']);

Route::apiResource('/fitas',  FitaController::class);


Route::apiResource('/fitasfetas',  FitaFetaController::class);
Route::get('/fitasfetas/{id}',[ FitaFetaController::class, 'show']);//necessita clau composta o ferho difrent


Route::apiResource('/combats',  CombatController::class);

Route::get('/combats/{id}',[ CombatController::class, 'show']);//necessita clau composta o ferho difrent

Route::put('/combats/{id}',[ CombatController::class, 'update']);
Route::post('/combats/{id}',[ CombatController::class, 'store']);


Route::apiResource('/jugadors',  JugadorController::class);
Route::get('/jugadors/{id}',[  JugadorController::class, 'show']);

Route::get('/jugadors/list/{id}',[  JugadorController::class, 'list']);

Route::post('/jugadors',[ JugadorController::class, 'store'])->middleware('auth:sanctum');