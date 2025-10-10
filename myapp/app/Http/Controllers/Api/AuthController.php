<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\RegisterUserAction;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Actions\LoginUserAction;
use App\Http\Actions\LogoutUserAction;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    public function register(StoreUserRequest $request): JsonResponse
    {
        return response()->json(RegisterUserAction::execute($request));
    }

    public function login(LoginUserRequest $request)
    {
        return response()->json(['token' => LoginUserAction::execute($request)]);
    }

    public function logout()
    {
        LogoutUserAction::execute();
        return response()->json(['message' => 'Logged out']);
    }
}
