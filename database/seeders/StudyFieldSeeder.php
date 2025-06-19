<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyField;

class StudyFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = ['Computer Science', 'Business', 'Engineering', 'Psychology', 'Design', 'Education'];
        foreach ($fields as $field) {
            StudyField::firstOrCreate(['name' => $field]);
        }
    }
}
