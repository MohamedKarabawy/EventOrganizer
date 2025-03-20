<?php

namespace App\Services;

use App\Models\User;

class UserViewService
{
    public function getAllUsers()
    {
        return User::paginate(10);
    }
}
