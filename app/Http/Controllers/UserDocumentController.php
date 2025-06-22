<?php

namespace App\Http\Controllers;

use App\Models\UserDocument;
use App\Models\UserResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Assuming you want to show all documents of the current user's resumes
        $documents = UserDocument::whereHas('resume', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('dashboard.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Let user select resume to attach document to
        $resumes = UserResume::where('user_id', Auth::id())->get();

        return view('dashboard.documents.create', compact('resumes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'resume_id' => 'required|exists:user_resumes,id',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Check ownership of resume
        $resume = UserResume::where('id', $request->resume_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $filePath = UserDocument::storeResumeFile($request->file('file'));

        UserDocument::create([
            'resume_id' => $resume->id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('dashboard.documents.index')->with('success', 'Document uploaded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDocument $userDocument)
    {
        return view('dashboard.documents.show', compact('document'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDocument $userDocument)
    {
        $userDocument->delete();

        return redirect()->route('dashboard.documents.index')->with('success', 'Document deleted.');
    }
}
