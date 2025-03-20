<?php

namespace App\Auth;

use App\Services\TokenService;
use App\Contracts\Auth\LoginInterface;
use App\Services\AuthenticationService;
use App\Http\Requests\Auth\LoginRequest;

class Login implements LoginInterface
{
    protected $authenticationService;
    protected $tokenService;

    public function __construct(AuthenticationService $authenticationService, TokenService $tokenService)
    {
        $this->authenticationService = $authenticationService;
        $this->tokenService = $tokenService;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->authenticationService->authenticate($request->only('email', 'password'));

        $token = $this->tokenService->generate($user, $request->input('remember', false));

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }
}