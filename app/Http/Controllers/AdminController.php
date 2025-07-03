<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use App\Models\StudyField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Gate to check for admin authorization
        if (! Gate::allows('admin')) {
            abort(403);
        }

        $users = User::where('role', '!=', 'admin')->get();
        $languages = Language::all();
        $studyFields = StudyField::all();

        return view('admin.dashboard', compact('users', 'languages', 'studyFields'));
    }

    /**
     * Add a new language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLanguage(Request $request)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:languages',
        ]);

        Language::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Language added successfully.');
    }

    /**
     * Delete a language.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteLanguage(Language $language)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }

        $language->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Language deleted successfully.');
    }

    /**
     * Add a new study field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addStudyField(Request $request)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:study_fields',
        ]);

        StudyField::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Study field added successfully.');
    }

    /**
     * Delete a study field.
     *
     * @param  \App\Models\StudyField  $studyField
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteStudyField(StudyField $studyField)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }

        $studyField->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Study field deleted successfully.');
    }

    /**
     * Delete a user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(User $user)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }

        // Prevent deleting admin users
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Cannot delete an admin account.');
        }

        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}
