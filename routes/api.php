<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DelegadoController;
use App\Http\Controllers\UserController;

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

Route::get('/delegado', [DelegadoController::class, 'index'])->middleware('auth:sanctum'); 
Route::post('/delegado', [DelegadoController::class, 'store']); 
Route::get('/delegado/{id}', [DelegadoController::class, 'show']); 
Route::put('/delegado/{id}', [DelegadoController::class, 'update']); 
Route::delete('/delegado/{id}', [DelegadoController::class, 'destroy']); 

Route::post('/login', [AuthController::class, 'login']);
Route::post('/store', [UserController::class, 'store']); 
