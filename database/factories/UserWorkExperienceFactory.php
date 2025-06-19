<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserWorkExperience;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserWorkExperience>
 */
class UserWorkExperienceFactory extends Factory
{   
    protected $model = UserWorkExperience::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-6 years', '-2 years');
        $end = $this->faker->boolean(80) ? $this->faker->dateTimeBetween($start, 'now') : null;

        return [
            'resume_id' => \App\Models\UserResume::factory(),
            'company_name' => $this->faker->company,
            'position' => $this->faker->jobTitle,
            'description' => $this->faker->sentence(12),
            'date_start' => $start,
            'date_end' => $end,
        ];
    }
}
