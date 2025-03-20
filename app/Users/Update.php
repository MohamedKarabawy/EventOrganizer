<?php

namespace App\Users;

use App\Services\UserUpdateService;
use App\Contracts\Users\UpdateUserInterface;
use App\Http\Requests\Users\UpdateUserRequest;

class Update implements UpdateUserInterface
{
    protected $userUpdateService;

    public function __construct(UserUpdateService $userUpdateService)
    {
        $this->userUpdateService = $userUpdateService;
    }

    public function update(UpdateUserRequest $request, int $userId)
    {
        try
        {
            $user = $this->userUpdateService->update($userId, $request->all());

            return response()->json(['message' => 'User Update Successfully.',
                                     'user' => $user], 201);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'User cannot be updated.', 
                'error' => $e->getMessage()], 400);         
        }
    }
}