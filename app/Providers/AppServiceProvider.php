<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <--- Make sure this is here
use Illuminate\Support\Facades\Auth; // <--- YOU NEED THIS LINE!
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ensure this line is within the boot method
        View::share('user', Auth::user());

        // This Gate definition fixes the "403 Forbidden" error.
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });
    }
}