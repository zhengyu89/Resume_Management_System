<?php

namespace App\Http\Controllers;

use App\Models\UserWorkExperience;
use Illuminate\Http\Request;

class UserWorkExperienceController extends Controller
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
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:1000',
        ]);

        // Get the user's resume
        $resume = auth()->user()->resume;

        if (!$resume) {
            return redirect()->route('dashboard.show', auth()->id())
                            ->with('error', 'Resume not found. Please create a resume first.');
        }

        $resume->workExperiences()->create($validated);

        return redirect()->route('dashboard.show', auth()->id())
                        ->with('success', 'Education record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserWorkExperience $workExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserWorkExperience $workExperience)
    {
        return view('workExperiences.edit', compact('workExperience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserWorkExperience $workExperience)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:1000',
        ]);

        $workExperience->update($validated);

        return redirect()->route('dashboard.show', auth()->id())
                        ->with('success', 'Work Experience updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserWorkExperience $workExperience)
    {
        // Check if the logged-in user owns this work experience record
        if ($workExperience->resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $workExperience->delete();

        return redirect()
            ->route('dashboard.show', Auth::id())
            ->with('success', 'Work Experience record deleted successfully.');
    }
}
