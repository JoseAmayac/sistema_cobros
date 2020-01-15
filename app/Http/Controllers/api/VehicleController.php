<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\VehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicle;
use Carbon\Carbon;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
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
        //$vehicle->papers_due_data = $request->papers_due_data;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
