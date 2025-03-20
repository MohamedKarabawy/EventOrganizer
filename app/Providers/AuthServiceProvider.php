<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('organizer', function (User $user) {
            return $user->role === 'organizer';
        });

        Gate::define('attendee', function (User $user) {
            return $user->role === 'attendee';
        });

        Gate::define('admin-or-organizer', function (User $user) {
            return $user->role === 'admin' || $user->role === 'organizer';
        });
    }
}
