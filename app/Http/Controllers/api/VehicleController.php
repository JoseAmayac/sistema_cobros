<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\VehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
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
        $id_admin = Auth::id();  // DEJAR
        //$id_admin = 1; // BORRAR
        $vehicles = Vehicle::where('admin_id', $id_admin)->get();

        return response()->json(['vehicles' => $vehicles], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $info = $request->all();
        $admin_id = Auth::id();
        //$admin_id = 1;
        $info['admin_id'] = $admin_id;
        $vehicle = Vehicle::create($info);

        return response()->json(['vehicle' => $info]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json(['vehicle' => $vehicle], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());
        $vehicle->papers_due_date = $request->papers_due_date;

        return response()->json(['vehicle' => $vehicle], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return response()->json(['message' => 'El vehículo ha sido eliminado'], 200);
    }
}
