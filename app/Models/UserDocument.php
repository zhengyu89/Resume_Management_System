<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    /** @use HasFactory<\Database\Factories\UserDocumentFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'resume_id',
        'file_path',
    ];

    // A document belongs to a resume
    public function resume()
    {
        return $this->belongsTo(UserResume::class, 'resume_id');
    }
}
