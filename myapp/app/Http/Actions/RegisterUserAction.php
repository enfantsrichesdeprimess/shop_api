<?php

namespace App\Http\Actions;


use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(Request $request)
    {
        return User::create($request->all());
    }
}
