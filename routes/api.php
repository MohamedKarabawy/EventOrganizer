<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RSVP\RSVPController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Events\EventsController;
use App\Http\Controllers\Attendance\AttendanceController;

 // Route for login
Route::post('auth/login', [AuthController::class, 'login']);

// Route for register
Route::post('auth/register', [AuthController::class, 'register']);

// Group routes with sanctum authentication middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    //Admins only
    Route::group(['middleware' => ['can:admin']], function () {
    // Create User
    Route::post('users', [UsersController::class, 'create']);

    // Delete User by ID
    Route::delete('users/{userId}', [UsersController::class, 'delete']);

    // Update User by ID
    Route::put('users/{userId}', [UsersController::class, 'update']);

    // View all users
    Route::get('users', [UsersController::class, 'view']);
    });

    //Admins or Organizer
    Route::group(['middleware' => ['can:admin-or-organizer']], function () {
    // Route to fetch and display the list of attendees
    Route::get('attendees', [AttendanceController::class, 'showAttendees']);
    
    // Create Event
    Route::post('events', [EventsController::class, 'create']);

    // Delete Event by ID
    Route::delete('events/{eventId}', [EventsController::class, 'delete']);
 
    // Update Event by ID
    Route::put('events/{eventId}', [EventsController::class, 'update']);
 
    // View Events (with filters if needed)
    Route::get('events', [EventsController::class, 'view']);

    // Keep track of events attendance
    Route::get('events/{eventId}/attendance', [AttendanceController::class, 'show']);

    // Define a POST route to associate users with a specific event
    Route::post('events/{eventId}/associate', [AttendanceController::class, 'associateUsersWithEvent']);

    });

    //Attendee only
    Route::group(['middleware' => ['can:attendee']], function () {
    // Route to fetch all events the authenticated user is attending (RSVPed)
    Route::get('events/attendee', [RSVPController::class, 'getUserEvents']);

    // Route for handling RSVP responses (accept/decline) for a specific event
    Route::post('events/{eventId}/rsvp', [RSVPController::class, 'respondToEvent']);
    });

    // Route for Logout
    Route::post('auth/logout', [AuthController::class, 'logout']);
});


