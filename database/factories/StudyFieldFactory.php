<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudyField;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyField>
 */
class StudyFieldFactory extends Factory
{
    protected $model = StudyField::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Computer Science', 'Business', 'Engineering', 'Design', 'Biology'
            ]),
        ];
    }
}
