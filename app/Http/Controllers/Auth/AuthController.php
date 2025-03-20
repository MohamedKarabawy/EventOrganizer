<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Users\CreateUserRequest;
use App\Auth\Login;
use App\Auth\Register; 

class AuthController extends Controller
{
    protected $login;
    protected $register;

    public function __construct(Login $login, Register $register)
    {
        $this->login = $login;
        $this->register = $register;
    }

    // Login method
    public function login(LoginRequest $request)
    {
        return $this->login->login($request);
    }

    // Register method
    public function register(CreateUserRequest $request)
    {
        return $this->register->create($request);
    }
}
