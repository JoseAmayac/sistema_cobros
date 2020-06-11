<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\User;
use App\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$admin_id = 1;
        $admin_id = Auth::id();
        //El rol de los empleados siempre es 2.
        $employees = User::where('admin_id', $admin_id)
                            ->where('role_id', 2)->get();
        foreach ($employees as $employee) {
            $employee->vehicle;
            $employee->route;
        }
        return response()->json(['employees' => $employees]);                                               
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $info = $request->all();
        $admin_id = Auth::id();
        $role_id = 2; // ==> Los cobradores tienen el rol con id=2.
        $info['admin_id'] = $admin_id;
        $info['role_id'] = $role_id;
        $employee = User::create($info);

        return response()->json([
            'employee' => $employee,
            'message' => 'Cobrador creado correctamente'
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
        $employee = User::findOrFail($id);

        return response()->json(['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        // $employee->dni = $request->dni;
        // $employee->name = $request->name;
        // $employee->lastname = $request->lastname;
        // $employee->cellphone = $request->cellphone;
        // $employee->address = $request->addres;

        $employee->update($request->all());

        return response()->json([
            'employee' => $employee
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();

        return response()->json([
            'message' => 'Cobrador eliminado de la lista'
        ]);
    }

    public function asignVehicle(Request $request,$id){
        $user = User::findOrFail($request->get('id'));
        $user->vehicle_id = $id;
        $user->update();

        return response()->json([
            'message' => 'Vehículo asignado correctamente'
        ]);
    }

    public function asignRoute(Request $request, $id){
        $user = User::findOrFail($request->get('id_employee'));
        $user->route_id = $id;
        $user->update();

        return response()->json([
            'message' => 'Ruta asignada correctamente'
        ]);
    }
}
