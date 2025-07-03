<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Auth as GlobalAuth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        $selectedRole = $request->input('role');

        // Your custom logic to ensure the selected role matches the account's role is preserved.
        if ($user->role !== $selectedRole) {
            Auth::logout(); // Log out if role doesn't match

            throw ValidationException::withMessages([
                'role' => 'The selected role does not match your account.',
            ]);
        }

        $request->session()->regenerate();

        // Your custom flash message is preserved.
        $request->session()->flash('just_logged_in', true);
        
        // --- MODIFIED SECTION ---
        // Check the user's role and redirect them to the correct dashboard.
        if ($user->role === 'admin') {
            // If the user is an admin, redirect to the admin dashboard.
            return redirect()->intended(route('admin.dashboard'));
        }

        // For any other user role, use your original redirect to their personal dashboard.
        return redirect()->intended(route('dashboard.show', ['id' => $user->id], absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
