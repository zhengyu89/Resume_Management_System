<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    /** @use HasFactory<\Database\Factories\UserLanguageFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'resume_id',
        'language_id',
    ];

    // A user language belongs to a resume
    public function resume()
    {
        return $this->belongsTo(UserResume::class, 'resume_id');
    }

    // A language belongs to a pre-defined language
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
