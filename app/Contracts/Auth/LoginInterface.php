<?php

namespace App\Contracts\Auth;

use App\Http\Requests\Auth\LoginRequest;

interface LoginInterface
{
    public function login(LoginRequest $request);
}