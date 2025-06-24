<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserResume;
use App\Models\Language;
use App\Models\StudyField;

class TalentSearchController extends Controller
{
    /**
     * Display a list of talents based on search filters.
     */
    public function index(Request $request)
    {
        $request->validate([
            'study_field_id' => 'nullable|exists:study_fields,id',
            'language_id' => 'nullable|exists:languages,id',
            'min_experience' => 'nullable|numeric|min:0',
        ]);

        $query = UserResume::query()->with(['user', 'educations.studyField', 'languages.language', 'workExperiences']);

        // Apply filters only if user selected filter
        if ($request->filled('study_field_id')) {
            $query->whereHas('educations', function($q) use ($request) {
                $q->where('study_field_id', $request->study_field_id);
            });
        }

        if ($request->filled('language_id')) {
            $query->whereHas('languages', function($q) use ($request) {
                $q->where('language_id', $request->language_id);
            });
        }

        if ($request->filled('min_experience')) {
            $query->whereHas('workExperiences', function($q) use ($request) {
                $q->whereRaw('TIMESTAMPDIFF(YEAR, date_start, COALESCE(date_end, CURDATE())) >= ?', [$request->min_experience]);
            });
        }
        
        $resumes = $query->get();

        $studyFields = StudyField::all();
        $languages = Language::all();

        // Return view with filtered data
        return view('TalentSearch', compact('resumes', 'studyFields', 'languages'));
    }
}
