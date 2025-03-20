<?php

namespace App\Contracts\Users;

use App\Http\Requests\Users\UpdateUserRequest;

interface UpdateUserInterface
{
    public function update(UpdateUserRequest $request, int $userId);
}