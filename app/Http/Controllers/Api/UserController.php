<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $token = Auth::user()->createToken('llave')->plainTextToken;
            return response()->json($token);
        }
        return response()->json('Error credenciales incorrectas',400);
    }
    
    public function store(Request $request){
        $validator = validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            $data=[
                'message'=>'error en la validacion de los datos',
                'errors'=>$validator->errors(),
                'status'=>400
            ];
            return response()->json($data,400);
        }
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        $token = $user->createToken('llave')->plainTextToken;
        return response()->json($token);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json('sesion cerrada');
    }
}
