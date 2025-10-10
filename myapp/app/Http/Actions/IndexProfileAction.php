<?php

namespace App\Http\Actions;

use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Database\Query\Builder;
use App\Models\User;

class IndexProfileAction
{
    /**
     * Create a new class instance.
     */
    public static function execute()
    {
       return auth()->user();
    }
}
