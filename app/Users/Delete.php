<?php

namespace App\Users;

use App\Services\UserDeletionService;
use App\Contracts\Users\DeleteUserInterface;

class Delete implements DeleteUserInterface
{
    protected $userDeletionService;

    public function __construct(UserDeletionService $userDeletionService)
    {
        $this->userDeletionService = $userDeletionService;
    }

    public function delete(int $userId)
    {
        try 
        {
            $this->userDeletionService->delete($userId);

            return response()->json(['message' => 'User deleted successfully.'], 200);  
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => $e->getMessage()], 404); 
        }
    }
}
