<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResume extends Model
{
    /** @use HasFactory<\Database\Factories\UserResumeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'about',
        'profile_pic',
        'cover_pic',
        'phone_number',
        'address',
    ];

    // A resume belongs to a user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A resume has many education records.
    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'resume_id');
    }

    // A resume has many work experiences.
    public function workExperiences()
    {
        return $this->hasMany(UserWorkExperience::class, 'resume_id');
    }

    // A resume has many languages.
    public function languages()
    {
        return $this->hasMany(UserLanguage::class, 'resume_id');
    }

    // A resume has many uploaded documents.
    public function documents()
    {
        return $this->hasMany(UserDocument::class, 'resume_id');
    }
}
