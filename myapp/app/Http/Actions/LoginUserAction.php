<?php

namespace App\Http\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class LoginUserAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))){
           throw new UnauthorizedHttpException('login');
        }
        $user = User::query()->where('email', $request->email)->first();
        $user->tokens()->delete();
        return $user->createToken("Token of user: {$user->name}")->plainTextToken;
        }
}
