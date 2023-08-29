<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class  CoursesTableTESTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of courses you want to create
        $numberOfCourses = 5;
    
        $streams = DB::table('streams')->pluck('id')->toArray();
        $category = DB::table('course_category')->pluck('id')->toArray();
    
        $courseNames = [
            'Business World',
            'Media Technology',
            'Communications',
            'Business Ethics',
            'Photography',
            'B Tech',
            'LLB',
            'M Tech',
            'Web Development',
            'Social Media',
        ];
    
        for ($i = 1; $i <= $numberOfCourses; $i++) {
            DB::table('courses')->insert([
                'name' => $courseNames[$i - 1],
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                'stream_id' => $streams[array_rand($streams)],
                'category_code' => $category[array_rand($category)],
                'code' => "COURSE{$i}",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }    
}
