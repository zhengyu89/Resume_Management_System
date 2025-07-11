<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyField extends Model
{
    /** @use HasFactory<\Database\Factories\StudyFieldFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    // A Study field can be referred by many education records
    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'study_field_id');
    }
}
