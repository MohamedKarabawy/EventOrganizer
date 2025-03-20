<?php

namespace App\Auth;

use App\Services\UserCreationService;
use App\Contracts\Users\CreateUserInterface;
use App\Http\Requests\Users\CreateUserRequest;

class Register implements CreateUserInterface
{
    protected $userCreationService, $type;

    public function __construct(UserCreationService $userCreationService)
    {
        $this->userCreationService = $userCreationService;
        $this->type = 'register';
    }

    public function create(CreateUserRequest $request)
    {
        try
        {
            $user = $this->userCreationService->create($request->all(), $this->type);

            return response()->json(['message' => 'Your Account Created Successfully.',
                                    'user' => $user], 201);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Account cannot be created.',
                                     'error' => $e->getMessage()], 400);
        }
    }
}