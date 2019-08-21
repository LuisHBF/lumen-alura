<?php

namespace App\Http\Middleware;
use Firebase\JWT\JWT;
use App\User;

use Closure;

class Autenticador{

    public function handle($request, Closure $next, $guard = null){
        try{
            
            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
            } else{
                $token = str_replace('Bearer ', '', $request->header('Authorization'));
                $dados = JWT::decode($token,env('JWT_KEY'),['HS256']);
                $usuario = user::query()->where('email','=',$dados->email)->first();
                
                if(is_null($usuario)){
                    throw new \Exception();
                }
                //return User::where('api_token', $request->input('api_token'))->first();
            }
            return $next($request);
            
        }catch(\Exception $e){
          return response()->json(['status' => 'Nao autorizado.']);
        }

    }

}
