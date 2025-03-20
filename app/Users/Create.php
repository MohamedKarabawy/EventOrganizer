<?php

namespace App\Users;

use App\Services\UserCreationService;
use App\Contracts\Users\CreateUserInterface;
use App\Http\Requests\Users\CreateUserRequest;

class Create implements CreateUserInterface
{
    protected $userCreationService;

    public function __construct(UserCreationService $userCreationService)
    {
        $this->userCreationService = $userCreationService;
    }

    public function create(CreateUserRequest $request)
    {
        try
        {
            $user = $this->userCreationService->create($request->all());

            return response()->json(['message' => 'User Created Successfully.',
                                    'user' => $user], 201);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'User cannot be created.',
                                     'error' => $e->getMessage()], 400);
        }
    }
}