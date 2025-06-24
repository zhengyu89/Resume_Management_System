<?php

namespace App\Http\Controllers;

use App\Models\UserResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserResume $userResume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserResume $userResume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request input
        $request->validate([
            'about' => 'nullable|string|max:5000', // Adjust max as needed
        ]);

        // Find the resume, ensure it belongs to the authenticated user
        $resume = UserResume::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Update the 'about' field
        $resume->about = $request->input('about');
        $resume->save();

        // Redirect back with a success message
        return back()->with('success', 'About section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserResume $userResume)
    {
        //
    }
}
