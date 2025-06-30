<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserResume;
use App\Models\Language;
use App\Models\StudyField;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            StudyFieldSeeder::class,
        ]);

        // Create 20 dummy users, each user has only 1 resume with fake data
        User::factory(20)->create()->each(function ($user) {
            $resume = $user->resume;
            $faker = \Faker\Factory::create();
            
            $languages = Language::inRandomOrder()->take(rand(1, 3))->get();
            foreach($languages as $lang) {
                $resume->languages()->attach($lang->id);
            }

            $fields = StudyField::inRandomOrder()->take(rand(1, 2))->get();
            foreach($fields as $field) {
                $start = $faker->dateTimeBetween('-10 years', '-4 years');
                $resume->educations()->create([
                    'study_field_id' => $field->id,
                    'school_name' => $faker->company . ' University',
                    'education_level' => $faker->randomElement(['High School', 'Diploma', "Bachelor's", "Master's", 'PhD']),
                    'date_start' => $start,
                    'date_end' => $faker->dateTimeBetween($start, 'now'),
                    'gpa' => $faker->randomFloat(2, 2.5, 4.0),
                ]);
            }

            for ($i = 0; $i < rand(1, 2); $i++) {
                $start = $faker->dateTimeBetween('-6 years', '-2 years');
                $resume->workExperiences()->create([
                    'company_name' => $faker->company,
                    'position' => $faker->jobTitle,
                    'description' => $faker->sentence(12),
                    'date_start' => $start,
                    'date_end' => $faker->boolean(80) ? $faker->dateTimeBetween($start, 'now') : null,
                ]);
            }
        });
    }
}
