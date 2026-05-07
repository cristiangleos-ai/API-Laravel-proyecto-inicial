<?php

/*
use Illuminate\Http\Request;
*/
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;


/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

*/
Route::get('/status', [StatusController::class, 'check']);
Route::post('/tasks',[TaskController::class, 'store']);

// Rutas Públicas
Route::post('/login', [AuthController::class, 'login']);

// Rutas Protegidas (Requieren JWT)
Route::middleware('auth:api')->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
});