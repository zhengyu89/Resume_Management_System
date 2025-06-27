<?php

namespace App\Http\Controllers;

use App\Models\UserDocument;
use App\Models\UserResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserDocumentController extends Controller
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
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:2048', // Max 2MB PDF
        ]);

        $user = Auth::user();
        $file = $request->file('file');

        $fileName = $file->getClientOriginalName();
        $destination = public_path('assets/documents');

        // Ensure directory exists
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $fileName);

        $relativePath = 'assets/documents/' . $fileName;

        $user->resume->documents()->create([
            'file_path' => $relativePath,
        ]);

        return back()->with('success', 'Resume uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDocument $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDocument $document)
    {
        // Check if the logged-in user owns this document
        if ($document->resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $absolutePath = public_path($document->file_path);

        if (file_exists($absolutePath)) {
            unlink($absolutePath);
        }

        $document->delete();

        return back()->with('success', 'Document deleted successfully.');
    }
}
