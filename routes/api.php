<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Rutas para los procesos de inicio de sesión, cambiar password
 * y cerrar sesión de un usuario(admin, cobrador) del sistema.
 */
Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::post('login', 'api\AuthController@login');
    Route::post('signup', 'api\AuthController@signup');
    Route::get('logout', 'api\AuthController@logout');
    Route::get('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');
    Route::post('reset-password','api\ResetPasswordController@sendEmail');
    Route::post('changePassword','api\ChangePasswordController@change');
    Route::apiResource('vehicles', 'api\VehicleController');
});
<<<<<<< HEAD
=======

/**
 * Rutas para realizar el CRUD de vehiculos.
 */
Route::apiResource('vehicles', 'api\VehicleController');
>>>>>>> 585084d427615a001f9ec378c7c6fcec8a6871f5

/**
 * Rutas para la realización el CRUD de clientes.
 */
Route::apiResource('clients', 'api\ClientController');

