<?php

namespace App\Auth;

use App\Contracts\Auth\LogoutInterface;

class Logout implements LogoutInterface
{
    public function logout()
    {
        try
        {
            auth()->user()->tokens()->delete();

            return response(['message' => 'Logged out successfully.'],200);
        }
        catch(\Exception $e)
        {
            return response(['message' => 'Something went wrong.'], 400);
        }
    }
}