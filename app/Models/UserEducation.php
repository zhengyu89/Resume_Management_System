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
        'date_start',
        'date_end',
        'gpa',
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
