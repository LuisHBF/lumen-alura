<?php
 namespace App\Http\Controllers;
 
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
     
 class TokenController extends Controller{
     
     public function login(Request $request){
        $this->validate($request, [
           'email' => 'email|required',
           'password' => 'required'
        ]);
        
        $usuario = User::query()->where('email','=',$request->email)->first();
        if(is_null($usuario) || !Hash::check($request->password,$usuario->password)){
            return response()->json('',401);
        }
        
        $token = JWT::encode(['email' => $request->email], env('JWT_KEY')); 
        
        return [
            'access_token' => $token
        ];
     }
 }