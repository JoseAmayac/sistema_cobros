<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends Controller
{
    public function change(ChangePasswordRequest $request){
        return $this->getPasswordResetTableRow($request)->count() > 0 ? $this->changePassword($request) : $this->tokenNotFound(); 
    }

    public function getPasswordResetTableRow($request){
        return DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->resetToken
        ]);
    }

    public function tokenNotFound(){
        return response()->json(['error'=>'El token no es correcto'],404);
    }

    public function changePassword($request){
        $user = User::whereEmail($request->email)->first();
        $user->update(['password'=>$request->password]);
        $this->getPasswordResetTableRow($request)->delete();
        return response()->json(['data'=>'Contraseña cambiada correctamente']);
    }
}
