<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\CargoController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\ModuloController;
use App\Http\Controllers\Api\PermisoController;
use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\SucursalController;
use App\Http\Controllers\Api\RequerimientoController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\CotizacionController;
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
Route::resource('sucursales', SucursalController::class);
Route::resource('roles', RolController::class);
Route::resource('permisos', PermisoController::class);
Route::resource('articulos', ArticuloController::class);
Route::resource('requerimientos', RequerimientoController::class);
Route::get('busca-requerimiento/{id}', [RequerimientoController::class, 'buscarRequerimiento']);
Route::resource('usuarios', UserController::class);
Route::resource('estados', EstadoController::class);
Route::post('/chat/send', [ChatController::class, 'sendMessage']);
Route::get('/chat/messages', [ChatController::class, 'getMessages']);
Route::post('chat/delete', [ChatController::class, 'deleteUserMessages']);
Route::resource('cotizaciones', CotizacionController::class);
