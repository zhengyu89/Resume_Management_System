<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserDocument extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'resume_id',
        'file_path',
    ];

    /**
     * The attributes that should be appended to model's array and JSON form.
     *
     * @var array<int, string>
     */
    protected $appends = ['file_url'];

    /**
     * A document belongs to a resume.
     */
    public function resume()
    {
        return $this->belongsTo(UserResume::class, 'resume_id');
    }

    /**
     * Get the full URL to access the file.
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        return asset($this->file_path); // e.g. 'asset/resume/filename.pdf'
    }

    /**
     * Static helper to handle file upload and return the path.
     * Optionally use this in your controller to centralize logic.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    public static function storeResumeFile($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('asset/resume');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return 'asset/resume/' . $filename;
    }
}
