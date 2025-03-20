<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreationService
{
    public function create(array $validatedData, ?string $type = null)
    {
        $validatedData['password'] = Hash::make($validatedData['password']);

        $type === 'register' && $validatedData['role'] = 'attendee';

        return User::create($validatedData);
    }
}