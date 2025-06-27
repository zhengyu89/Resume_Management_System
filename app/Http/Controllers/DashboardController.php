<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;

use App\Models\Language;
use App\Models\StudyField;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\UserEducation;
use App\Models\UserLanguage;
use App\Models\UserResume;
use App\Models\UserWorkExperience;


class DashboardController extends Controller
{
  public function show($id)
  {
    // $user = Auth::user();
    $user = User::findOrFail($id);

    if (Auth::user()?->id != $id) {
      return redirect()->route("profile", ["id" => $id]);
    }

    $availableLanguages = Language::orderBy('name')->get();

    return view('dashboard.show', compact('user', 'id', 'availableLanguages'));
  }

  public function profile($id)
  {
    $user = User::findOrFail($id);

    // redirect back to own dashboard
    if (Auth::user()?->id == $id) {
      return redirect()->route("dashboard.show", ["id" => $id]);
    }

    $availableLanguages = Language::orderBy('name')->get();

    return view('dashboard.show', compact('user', 'id', 'availableLanguages')); 
  }

  public function destroy(Request $request)
  {
    $user = Auth::user();

    // Logout user first
    Auth::logout();

    // Delete user account
    $user->delete();

    // Invalidate session and regenerate token for security
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect to homepage with success message
    return redirect('/')->with('status', 'Your account has been deleted successfully.');
  }
}
