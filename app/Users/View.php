<?php

namespace App\Users;

use App\Services\UserViewService;
use App\Contracts\Users\ViewUsersInterface;

class View implements ViewUsersInterface
{
    protected $userViewService;

    public function __construct(UserViewService $userViewService)
    {
        $this->userViewService = $userViewService;
    }

    public function view()
    {
        try 
        {
            $users = $this->userViewService->getAllUsers();

            return response()->json(['users' => $users], 200);  
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Error fetching users.'], 500);  
        }
    }
}
