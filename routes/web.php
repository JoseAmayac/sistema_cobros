<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    // $route = App\Route::findOrFail(1);
    // //$users = $route->users();

    // foreach ($route->users as $user) 
    // {
    //     return response()->json(['data' => $user]);
    // }


    $user = App\User::findOrFail(1);

    foreach ($user->routes as $route)
    {
        return response()->json(['data' => $route]);
    }
    
});
