<?php

namespace Database\Seeders;

use App\Models\College;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegeCoursesTESTTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all courses and colleges from their respective tables
        $courses = Course::all();
        $colleges = College::all();

        // Define the maximum number of college courses for each college
        $maxCoursesPerCollege = 3;

        foreach ($colleges as $college) {
            $randomCourses = $courses->random(rand(1, $maxCoursesPerCollege));

            foreach ($randomCourses as $course) {
                DB::table('college_courses')->insert([
                    'college_id' => $college->id,
                    'course_id' => $course->id,
                    'code' => 'COLCOURSE_' . $college->id . '_' . $course->id,
                    'fee' => rand(1000, 5000),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
