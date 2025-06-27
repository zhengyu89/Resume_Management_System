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
    public function show(UserResume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserResume $resume)
    {
        $this->authorize('update', $resume);

        return view('dashboard.resume.edit', compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserResume $resume)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'about' => 'nullable|string|max:5000',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg',
            'cover_pic' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $user = Auth::user();
        $userId = $user->id;

        if ($request->has('name')) {
            $user->update(['name' => $request->input('name')]);
        }
        if ($request->has('title')) {
            $resume->title = $request->input('title');
        }
        if ($request->has('about')) {
            $resume->about = $request->input('about');
        }
        if ($request->has('address')) {
            $resume->address = $request->input('address');
        }
        if ($request->has('phone_number')) {
            $resume->phone_number = $request->input('phone_number');
        }
        
        // Store Profile Picture
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = $userId . '_profile.' . $file->getClientOriginalExtension();
            $destination = public_path('assets/profile_pics');
            // Create folder if it doesn't exist
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            // Delete old file if exists and not the default
            if ($resume->profile_pic && file_exists(public_path($resume->profile_pic)) && $resume->profile_pic !== 'assets/profile_pics/default.jpg') {
                unlink(public_path($resume->profile_pic));
            }

            $file->move($destination, $filename);
            
            $resume->profile_pic = 'assets/profile_pics/' . $filename;
        }

        // Store Cover Picture
        if ($request->hasFile('cover_pic')) {
            $file = $request->file('cover_pic');
            $filename = $userId . '_cover.' . $file->getClientOriginalExtension();
            $destination = public_path('assets/cover_pics');
            // Create folder if it doesn't exist
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            // Delete old file if exists and not the default
            if ($resume->cover_pic && file_exists(public_path($resume->cover_pic)) && $resume->cover_pic !== 'assets/cover_pics/default.jpg') {
                unlink(public_path($resume->cover_pic));
            }

            $file->move($destination, $filename);

            $resume->cover_pic = 'assets/cover_pics/' . $filename;
        }

        $resume->save();

        return back()->with('success', 'Resume updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserResume $resume)
    {
        //
    }
}
