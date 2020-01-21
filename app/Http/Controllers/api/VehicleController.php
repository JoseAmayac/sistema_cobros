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
        $id_admin = Auth::id();
        $vehicles = Vehicle::where('admin_id', $id_admin)->get();

        return response()->json(['vehicles' => $vehicles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicle = new Vehicle();
        $vehicle->license_plate = $request->license_plate;
        $vehicle->mark = $request->mark;
        $vehicle->model = $request->model;
        $vehicle->cylindering = $request->cylindering;
        $vehicle->papers_due_date = Carbon::now();
        $vehicle->admin_id = Auth::id();
        $vehicle->save();

        return response()->json(['data' => $vehicle]);
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
        return response()->json(['vehicle' => $vehicle]);
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

        return response()->json(['vehicle' => $vehicle]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id)->delete();
        return response()->json(['message' => 'El vehículo ha sido eliminado']);
    }
}
