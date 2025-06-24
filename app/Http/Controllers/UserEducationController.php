<?php

namespace App\Http\Controllers;

use App\Models\UserEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEducationController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'study_field_id' => 'nullable|exists:study_fields,id',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
            'gpa' => 'nullable|numeric|between:0,4.00',
        ]);

        // Get the user's resume
        $resume = auth()->user()->resume;

        if (!$resume) {
            return redirect()->route('dashboard.show', auth()->id())
                            ->with('error', 'Resume not found. Please create a resume first.');
        }

        $resume->educations()->create($validated);

        return redirect()->route('dashboard.show', auth()->id())
                        ->with('success', 'Education record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserEducation $userEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserEducation $education)
    {
        return view('educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserEducation $education)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'study_field_id' => 'nullable|exists:study_fields,id',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
            'gpa' => 'nullable|numeric|between:0,4.00',
        ]);

        $education->update($validated);

        return redirect()
            ->route('dashboard.show', auth()->id())
            ->with('success', 'Education updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserEducation $userEducation)
    {
        //
    }
}
