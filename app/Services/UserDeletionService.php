<?php

namespace App\Services;

use App\Models\User;

class UserDeletionService
{
    public function delete(int $userId)
    {
        $user = User::find($userId);

        if (!$user) 
        {
            throw new \Exception('User not found');
        }

        $user->delete();
    }
}
