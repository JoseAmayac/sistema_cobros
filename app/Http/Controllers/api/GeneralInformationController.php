<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Route;
use App\Vehicle;
use App\User;

class GeneralInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
        $this->middleware('role');
    }

    /**
     * Obtiene el número de recursos creados por el administrado.
     * ya sea Rutas, Vehículos, Clientes ... Etc.
     */
    public function getGeneralCount()
    {
        $admin_id = Auth::id();
        //$admin_id = 1;
        $routes = Route::where('admin_id', $admin_id)->count();
        $vehicles = Vehicle::where('admin_id', $admin_id)->count();
        $clients = User::where('admin_id', $admin_id)->where('role_id', 3)->count();
        $employees = User::where('admin_id', $admin_id)->where('role_id', 2)->count();

        return response()->json([
            'routes' => $routes,
            'vehicles' => $vehicles,
            'clients' => $clients,
            'employees' => $employees
        ]);

    }
}
