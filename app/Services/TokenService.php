<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;

class TokenService
{
    public function generate(User $user, bool $remember)
    {
        $token_duration = Carbon::now()->addHours(6);

        if ($remember) 
        {
            $token_duration = Carbon::now()->addDays(7);
            
            return $user->createToken($user->name.'_'.Carbon::now(),['*'], $token_duration)->plainTextToken;
        }

        return $user->createToken($user->name.'_'.Carbon::now(),['*'], $token_duration)->plainTextToken;
    }
}
