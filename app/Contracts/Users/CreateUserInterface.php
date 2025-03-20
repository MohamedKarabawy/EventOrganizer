<?php

namespace App\Contracts\Users;

use App\Http\Requests\Users\CreateUserRequest;

interface CreateUserInterface
{
    public function create(CreateUserRequest $request);
}