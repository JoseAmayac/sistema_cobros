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
    // Rutas para el modulo de autenticación
    Route::post('login', [ 'as' => 'login', 'uses' => 'api\AuthController@login']);    
    Route::post('signup', 'api\AuthController@signup');
    Route::get('logout', 'api\AuthController@logout');
    Route::get('refresh', 'api\AuthController@refresh');
    Route::get('me', 'api\AuthController@me');
    Route::post('reset-password','api\ResetPasswordController@sendEmail');
    Route::post('changePassword','api\ChangePasswordController@change');

    // Rutas para rutas, ajjaaajajja
    Route::get('routes/asign','API\RouteController@listAsign');
    Route::put('routes/asign/{routes}','api\EmployeeController@asignRoute');
    Route::apiResource('routes','api\RouteController');

    // Rutas para vehiculos
    Route::get('vehicles/asign','api\VehicleController@listAsign');

    Route::put('vehicles/asign/{vehicle}','api\EmployeeController@asignVehicle');

    Route::apiResource('vehicles', 'api\VehicleController');
    // Rutas para clientes
    Route::apiResource('clients', 'api\ClientController');

    // Rutas para los cobradores (employees)
    Route::apiResource('employees', 'api\EmployeeController');    

    // Rutas para las acciones que se realizan sobre las rutas del sistema.
    Route::get('prueba', 'api\RouteUserController@prueba');

    // Ruta para obtener el número de recursos creados por el administrador.
    Route::get('general', 'api\GeneralInformationController@getGeneralCount');

});


