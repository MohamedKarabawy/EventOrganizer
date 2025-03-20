<?php

namespace App\Services;

use App\Models\User;

class UserUpdateService
{
    public function update(int $userId, array $validatedData)
    {
        $user = User::find($userId);

        if (!$user) 
        {
            throw new \Exception('User not found');
        }

        (isset($validatedData['password']) && !empty($validatedData['password'])) 
        && $validatedData['password'] = Hash::make($validatedData['password']);

        $user->update($validatedData);

        return $user;
    }
}