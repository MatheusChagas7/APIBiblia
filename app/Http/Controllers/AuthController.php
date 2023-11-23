<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request){ 

        $credentials = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password'])
        ]);

        $token = $user->createToken($request->nameToken)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)){
            return response([
                'message' => 'E-mail ou Senha invalidos.'
            ], 401);
        }

        $token = $user->createToken('Usuario Logado')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}