<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserLanguage;
use App\Models\Language;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserLanguage>
 */
class UserLanguageFactory extends Factory
{
    protected $model = UserLanguage::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resume_id' => \App\Models\UserResume::factory(),
            'language_id' => Language::inRandomOrder()->first()?->id ?? Language::factory(),
        ];
    }
}
