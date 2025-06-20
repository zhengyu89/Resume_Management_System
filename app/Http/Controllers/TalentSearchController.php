<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserResume;
use App\Models\Language;
use App\Models\StudyField;
use Carbon\Carbon;

class TalentSearchController extends Controller
{
    /**
     * Display a list of talents based on search filters.
     */
    public function index(Request $request)
    {
        // Get filters from request
        $studyFieldId = $request->input('study_field_id');
        $languageId = $request->input('language_id');
        $minExperience = $request->input('min_experience', 0);

        // Get all languages and study fields for filters
        $languages = Language::all();
        $studyFields = StudyField::all();

        // Get resumes and filter
        $resumes = UserResume::with([
            'user',
            'educations.studyField',
            'languages.language',
            'workExperiences'
        ])
        ->when($studyFieldId, function ($query) use ($studyFieldId) {
            $query->whereHas('educations', function ($q) use ($studyFieldId) {
                $q->where('study_field_id', $studyFieldId);
            });
        })
        ->when($languageId, function ($query) use ($languageId) {
            $query->whereHas('languages', function ($q) use ($languageId) {
                $q->where('language_id', $languageId);
            });
        })
        ->get();
        $resumes = $resumes->filter(function ($resume) use ($minExperience) {
            // Calculate total years of experience for this resume
            $years = $resume->workExperiences->sum(function ($exp) {
                $start = Carbon::parse($exp->date_start);
                $end = $exp->date_end ? Carbon::parse($exp->date_end) : now();
                return $end->diffInYears($start);
            });

            // Add the calculated experience to the model (for display)
            $resume->total_experience = $years;

            return $years >= $minExperience;
        });

        // Return view with filtered data
        return view('TalentSearch', [
            'resumes' => $resumes,
            'languages' => $languages,
            'studyFields' => $studyFields,
        ]);
    }

}
