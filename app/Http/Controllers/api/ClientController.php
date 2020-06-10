<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Role;
use App\User;
use App\Photo;
use Facade\FlareClient\Http\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$id_admin = Auth::id();
        $id_admin = 1;
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
        $admin_id = Auth::id(); 
        $role_id = 3; // ==> El rol "Cliente" siempre será el id 3.
        $info = $request->all();
        $info['admin_id'] = $admin_id;
        $info['role_id'] = $role_id;
        
        // $photo = $request->file('photo');
        // if($photo)
        // {
        //     $path = Storage::putFile('public/users/clients', $photo);
            
        //     $client_photo = new Photo();
        //     $client_photo->route = $path;
        //     $client_photo->save();
        //     $info['photo_id'] = $client_photo->id;
        // }
        // else //Se le asigna la foto por defecto para los usuarios.
        // {
        //     $info['photo_id'] = 1; //==> la foto por defecto de usuarios tiene el id "1".
        // }

        // $path_photo = "/storage".substr($path,6, strlen($path));
        
        $client = User::create($info);
        return response()->json([
            'client' => $client,
            'message' => 'Cliente creado correctamente'
        ], 200);
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
        if($client->photo){
            $path_photo = "/storage".substr($client->photo->route,6, strlen($client->photo->route));
            return response()->json(['client' => $client,'path'=>$path_photo]); 
        }else{
            return response()->json(['client' => $client,'path'=>'']); 
        }
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
        $image = $request->file('photo');
        if($image){
            $old_photo = $client->photo;
            /**
             * Si viene  una foto en el request y ya tenia una foto antes, la vieja foto se elinina
             */
            if($old_photo){
                Storage::delete($client->photo->route);
                Photo::findOrFail($client->photo->id)->delete();
            }
            $photo = $request->file('photo');
            $new_photo_path = Storage::putFile('public/users/clients',$photo);
            $client_photo = new Photo();
            $client_photo->route = $new_photo_path;
            $client_photo->save();
            $request['photo_id'] = $client_photo->id;
        }
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
        if($client->photo){
            Storage::delete($client->photo->route);
        }
        $client->delete();
        return response()->json([
            'message' => 'Cliente eliminado de la lista'
        ]);
    }
}
