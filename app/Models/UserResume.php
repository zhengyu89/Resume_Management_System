<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserResume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'about',
        'profile_pic',
        'cover_pic',
        'phone_number',
        'address',
    ];

    protected $appends = ['profile_pic_url', 'cover_pic_url'];

    // ========== Relationships ==========

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'resume_id');
    }

    public function workExperiences()
    {
        return $this->hasMany(UserWorkExperience::class, 'resume_id');
    }

    public function userLanguages()
    {
        return $this->hasMany(UserLanguage::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'user_languages', 'resume_id', 'language_id');
    }

    public function documents()
    {
        return $this->hasMany(UserDocument::class, 'resume_id');
    }

    // ========== Accessors ==========

    public function getProfilePicUrlAttribute()
    {
        return $this->profile_pic ? asset($this->profile_pic) : null;
    }

    public function getCoverPicUrlAttribute()
    {
        return $this->cover_pic ? asset($this->cover_pic) : null;
    }

    public function getWorkExpDisplayAttribute()
    {
        $totalYears = 0;

        foreach ($this->workExperiences as $work) {
            $start = Carbon::parse($work->date_start);
            $end = $work->date_end ? Carbon::parse($work->date_end) : now();
            $totalYears += $start->diffInRealYears($end);
        }

        if ($totalYears <= 0) { return "none"; }
        else if ($totalYears < 5) { 
            $ceilTotalYears = ceil($totalYears);
            return "< {$ceilTotalYears} " . Str::plural("year", $ceilTotalYears);
        }
        else { return "≥ 5 years"; }
    }

    // ========== Static File Handlers ==========

    public static function storeProfilePic($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('asset/profile_pics');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return 'asset/profile_pics/' . $filename;
    }

    public static function storeCoverPic($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('asset/cover_pics');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return 'asset/cover_pics/' . $filename;
    }
}
