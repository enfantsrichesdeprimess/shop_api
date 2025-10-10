<?php

namespace App\Http\Actions;

use App\Http\Requests\UpdateUserInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateUserInfoAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(UpdateUserInfoRequest $request)
    {
       $user = auth()->user();
       DB::table('users')->where('id',$user->id)->update([
           'fio' => $request->fio,
       ]);
       return $user;
    }
}
