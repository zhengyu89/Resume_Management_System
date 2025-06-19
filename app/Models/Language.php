<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /** @use HasFactory<\Database\Factories\LanguageFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    // A language can be referred by many user languages
    public function userLanguages()
    {
        return $this->hasMany(UserLanguage::class);
    }
}
