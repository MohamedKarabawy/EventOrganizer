<?php

namespace App\Contracts\Users;

interface DeleteUserInterface
{
    public function delete(int $userId);
}