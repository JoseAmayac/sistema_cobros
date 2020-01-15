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

Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::post('login', 'api\AuthController@login');
    Route::post('signup', 'api\AuthController@signup');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');
    Route::post('reset-password','api\ResetPasswordController@sendEmail');
    Route::post('changePassword','api\ChangePasswordController@change');
});


Route::apiResource('vehicles', 'api\VehicleController');
