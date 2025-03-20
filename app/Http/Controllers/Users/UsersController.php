<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Users\Create;
use App\Users\Delete;
use App\Users\Update;
use App\Users\View;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UsersController extends Controller
{
    protected $createUserService;
    protected $deleteUserService;
    protected $updateUserService;
    protected $viewUserService;

    // Injecting the concrete service classes
    public function __construct(
        Create $createUserService,
        Delete $deleteUserService,
        Update $updateUserService,
        View $viewUserService
    )
    {
        $this->createUserService = $createUserService;
        $this->deleteUserService = $deleteUserService;
        $this->updateUserService = $updateUserService;
        $this->viewUserService = $viewUserService;
    }

    // Create user
    public function create(CreateUserRequest $request)
    {
        return $this->createUserService->create($request);  // Service handles response and exceptions
    }

    // Delete user
    public function delete(int $userId)
    {
        return $this->deleteUserService->delete($userId);  // Service handles response and exceptions
    }

    // Update user
    public function update(UpdateUserRequest $request, int $userId)
    {
        return $this->updateUserService->update($request, $userId);  // Service handles response and exceptions
    }

    // View users
    public function view()
    {
        return $this->viewUserService->view();  // Service handles response and exceptions
    }
}
