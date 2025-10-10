<?php

namespace App\Http\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutUserAction
{
    /**
     * Create a new class instance.
     */
    public static function execute()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
