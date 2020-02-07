<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicle;

class RouteUserController extends Controller
{
    public function prueba()
    {
        $vehicleExample = Vehicle::findOrFail(1);

        return response()->json(['example' => $vehicleExample]);
    }
}
