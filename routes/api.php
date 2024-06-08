<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CargoController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\ModuloController;
use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::resource('areas', AreaController::class);
Route::resource('cargos', CargoController::class);
Route::get('busca-cargo/{id_area}', [CargoController::class, 'buscaCargos']);
Route::resource('modulos', ModuloController::class);
Route::resource('personas', PersonaController::class);
Route::get('busca-peronsa-documento/{documento}', [PersonaController::class, 'buscaPorDocumento']);
Route::resource('empleados', EmpleadoController::class);
Route::resource('proveedores', ProveedorController::class);
// Route::resource('positions', PositionController::class);
// Route::get('positions-for-area/{id}', [PositionController::class, 'positionsForArea']);
// Route::resource('persons', PersonController::class);
// Route::resource('employees', EmployeeController::class);
// Route::resource('roles', RoleController::class);
