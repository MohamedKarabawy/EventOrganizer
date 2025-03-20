<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Events\EventsController;

 // Route for login
Route::post('auth/login', [AuthController::class, 'login']);

// Route for register
Route::post('auth/register', [AuthController::class, 'register']);

// Group routes with passport authentication middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Create User
    Route::post('users', [UsersController::class, 'create']);

    // Delete User by ID
    Route::delete('users/{userId}', [UsersController::class, 'delete']);

    // Update User by ID
    Route::put('users/{userId}', [UsersController::class, 'update']);

    // View all users
    Route::get('users', [UsersController::class, 'view']);

    // Create Event
    Route::post('events', [EventsController::class, 'create']);

    // Delete Event by ID
    Route::delete('events/{eventId}', [EventsController::class, 'delete']);
 
    // Update Event by ID
    Route::put('events/{eventId}', [EventsController::class, 'update']);
 
    // View Events (with filters if needed)
    Route::get('events', [EventsController::class, 'view']);
});


