<?php

namespace App\Http\Controllers\Auth;

use App\Auth\Login;
use App\Auth\Logout;
use App\Auth\Register; 
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Users\CreateUserRequest;

class AuthController extends Controller
{
    protected $login;
    protected $register;
    protected $logout;

    public function __construct(Login $login, Register $register, Logout $logout)
    {
        $this->login = $login;
        $this->logout = $logout;
        $this->register = $register;
    }

    // Login method
    public function login(LoginRequest $request)
    {
        return $this->login->login($request);
    }

    // Logout method
    public function logout()
    {
        return $this->logout->logout();
    }

    // Register method
    public function register(CreateUserRequest $request)
    {
        return $this->register->create($request);
    }
}
