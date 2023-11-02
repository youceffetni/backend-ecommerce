<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(LoginRequest $request){
        

        $credentials=[
            "email"=>$request->email,
            "password"=>$request->password,
        ];

      if(Auth::attempt($credentials))
        {

            $user=Auth::user();
            $token=$user->createToken($user->name)->plainTextToken;

            return response(compact('token'));
        }
        
        
        return response([
            "errors" =>["passwordError"=>["Password incorrect"]],
        ],422);

       
    }


    public function Logout(Request $request){

      
        // Revoke all tokens...
       // $request->user()->tokens()->delete();

       // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();

        // Revoke a specific token...
        //$user->tokens()->where('id', $tokenId)->delete(); 

        return response("",204);
    }
}
