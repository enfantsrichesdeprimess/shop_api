<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(StoreUserRequest $request){
        return User::create($request->all());
    }

    public function login(LoginUserRequest $request){
        if (!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['error' => 'Login failed, Incorrected email or password'], 401);
        }
        $user = User::query()->where('email', $request->email)->first();
        $user->tokens()->delete();
        return response()->json([
            'user' => [
                'token' => $user->createToken("Token of user: {$user->name}")->plainTextToken,
            ],
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
