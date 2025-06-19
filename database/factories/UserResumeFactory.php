<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserResume;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserResume>
 */
class UserResumeFactory extends Factory
{   
    protected $model = UserResume::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->jobTitle,
            'about' => $this->faker->paragraph,
            'profile_pic' => 'profile_pics/default.jpg',
            'cover_pic' => 'cover_pics/default.jpg',
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (UserResume $resume) {
            \App\Models\UserEducation::factory()->count(2)->create(['resume_id' => $resume->id]);
            \App\Models\UserWorkExperience::factory()->count(2)->create(['resume_id' => $resume->id]);
            \App\Models\UserLanguage::factory()->count(2)->create(['resume_id' => $resume->id]);
            \App\Models\UserDocument::factory()->create(['resume_id' => $resume->id]);
        });
    }
}
