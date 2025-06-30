<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    /** @use HasFactory<\Database\Factories\UserEducationFactory> */
    use HasFactory;

    protected $table = 'user_educations';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'resume_id',
        'study_field_id',
        'school_name',
        'education_level',
        'date_start',
        'date_end',
        'gpa',
    ];

    // Cast from string to date for formating July 2003 purpose at frontend
    protected $casts = [
        'date_start' => 'date', // or 'datetime'
        'date_end' => 'date',   // or 'datetime'
    ];

    // A educational record belongs to a resume
    public function resume()
    {
        return $this->belongsTo(UserResume::class, 'resume_id');
    }

    // Study field belongs to a pre-defined study field
    public function studyField()
    {
        return $this->belongsTo(StudyField::class, 'study_field_id');
    }
}
