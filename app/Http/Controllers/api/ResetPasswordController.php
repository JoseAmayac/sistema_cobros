<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function sendEmail(Request $request){
        if (!$this->validateEmail($request->email)) {
            return $this->failureResponse();
        }
        $this->send($request->email);
        return $this->successResponse();
    }

    public function validateEmail($email){
        return User::where('email',$email)->first();
    }

    public function failureResponse(){
        return response()->json([
            'error' => 'El correo electrónico no se encuentra en nuesta base de datos'
        ],Response::HTTP_NOT_FOUND);
    }

    public function send($email){
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token,$email));
    }

    public function createToken($email){
        $old_token = DB::table('password_resets')->where('email',$email)->first()->token;
        if($old_token){
            return $old_token;
        }
        $token = Str::random(60);
        $this->saveToken($token,$email);
        return $token;
    }

    public function saveToken($token,$email){
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    public function successResponse(){
        return response()->json([
            'message' => 'El correo electrónico ha sido enviado, por favor revisa tu bandeja de entrada'
        ],Response::HTTP_OK);
    }
}
