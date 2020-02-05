<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Role;
use App\User;

// use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_admin = Auth::id();
        //El rol de cliente siempre será el id = 3.
        $clients = User::where('admin_id', $id_admin)
                            ->where('role_id', 3)->get(); 
                            
        return response()->json(['clients' => $clients], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //return response()->json(['client' => "jajaj"], 200);
        $admin_id = Auth::id(); // =====>>>ERROOR, no funciona para este metodo.
        //$admin_id = 1;
        $role_id = 3; // ==> El rol "Cliente" siempre será el id 3.
        $info = $request->all();
        $info['admin_id'] = $admin_id;
        $info['role_id'] = $role_id;
        $client = User::create($info);

        return response()->json(['client' => $client], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::findOrFail($id);
        $client->role;
        return response()->json(['client' => $client]);
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
        $client = User::findOrFail($id);
        $client->update($request->all());

        return response()->json([
            'client' => $client
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
        $client = User::findOrFail($id);
        $client->delete();

        return response()->json([
            'message' => 'Cliente eliminado de la lista'
        ]);
    }
}
