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
        $id_admin = 1; // BOOOOORRRARRR
        //$id_admin = Auth::id(); // DEEEJJJAAARRR
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
        $id = Auth::id();
        $client = User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'dni' => $request->input('dni'),
            'cellphone' => $request->input('cellphone'),
            'address' => $request->input('address'),
            'role_id' => Role::where('name','client')->first()->id
        ]);
        $client->admin_id = $id;
        $client->save();

        return response()->json(['client' => $client],200);
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
    public function update(ClientRequest $request, $id)
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
