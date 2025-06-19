<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserEducation;
use App\Models\StudyField;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserEducation>
 */
class UserEducationFactory extends Factory
{   
    protected $model = UserEducation::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $start = $this->faker->dateTimeBetween('-10 years', '-4 years');
        $end = $this->faker->dateTimeBetween($start, 'now');

        return [
            'resume_id' => \App\Models\UserResume::factory(),
            'study_field_id' => StudyField::inRandomOrder()->first()?->id ?? StudyField::factory(),
            'school_name' => $this->faker->company . ' University',
            'date_start' => $start,
            'date_end' => $end,
            'gpa' => $this->faker->randomFloat(2, 2.5, 4.0),
        ];
    }
}
