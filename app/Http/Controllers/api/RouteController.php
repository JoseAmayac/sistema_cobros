<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RouteRequest;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_admin = Auth::id();
        $routes = Route::where('admin_id',$id_admin)->get();

        return response()->json([
            'routes' => $routes
        ]);
    }

    /**
     * Almacena una nueva ruta en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {
        $info = $request->all();
        $info['admin_id'] = Auth::id();
        $route = Route::create($info);

        return response()->json([
            'route' => $info
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = Route::findOrFail($id);

        return response()->json([
            'route' => $route
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RouteRequest $request, $id)
    {
        $route = Route::findOrFail($id);
        $route->update($request->all());

        return response()->json([
            'route' => $route
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Ruta eliminada de la lista'
        ]);
    }
}
