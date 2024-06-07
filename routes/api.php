<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\RoleController;
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
Route::resource('positions', PositionController::class);
Route::get('positions-for-area/{id}', [PositionController::class, 'positionsForArea']);
Route::resource('persons', PersonController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('roles', RoleController::class);
