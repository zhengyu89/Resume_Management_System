<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkExperience extends Model
{
    /** @use HasFactory<\Database\Factories\UserWorkExperienceFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'resume_id',
        'company_name',
        'position',
        'description',
        'date_start',
        'date_end',
    ];

    // A work experience record belongs to a resume
    public function resume()
    {
        return $this->belongsTo(UserResume::class, 'resume_id');
    }
}
