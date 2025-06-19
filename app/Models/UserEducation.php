<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyField extends Model
{
    /** @use HasFactory<\Database\Factories\StudyFieldFactory> */
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'study_field_id',
        'school_name',
        'date_start',
        'date_end',
        'gpa',
    ];

    // A Educational record belongs to a Resume
    public function resume()
    {
        return $this->belongsTo(UserResume::class, 'resume_id');
    }

    // Study field belongs to pre-defined sets
    public function studyField()
    {
        return $this->belongsTo(StudyField::class, 'study_field_id');
    }
}
