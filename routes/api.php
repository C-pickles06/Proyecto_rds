<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FuncionesCargoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/empleados', [EmpleadoController::class, 'index']);
    Route::post('/empleados', [EmpleadoController::class, 'store']);
    Route::get('/empleados/{emppleado}', [EmpleadoController::class, 'show']);
    Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update']);
    Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy']);

    Route::get('/cargos', [CargoController::class, 'index']);
    Route::post('/cargos', [CargoController::class, 'store']);
    Route::get('/cargos/{cargo}', [CargoController::class, 'show']);
    Route::put('/cargos/{cargo}', [CargoController::class, 'update']);
    Route::delete('/cargos/{cargo}', [CargoController::class, 'destroy']);

    Route::get('/funcionesCargo',[FuncionesCargoController::class, 'index']);
    Route::post('/funcionesCargo',[FuncionesCargoController::class, 'store']);
    Route::get('/funcionesCargo/{funcionesCargo}',[FuncionesCargoController::class, 'show']);
    Route::put('/funcionesCargo/{funcionesCargo}',[FuncionesCargoController::class, 'update']);
    Route::delete('/funcionesCargo/{funcionesCargo}',[FuncionesCargoController::class, 'destroy']);

    Route::get('/user',function(Request $request){
        return $request->user();
    });
});
