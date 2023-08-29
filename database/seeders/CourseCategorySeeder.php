<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Under Graduate',
                'code' => 'UG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Post Graduate',
                'code' => 'PG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Masters',
                'code' => 'MG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Doctor of Philosophy',
                'code' => 'PHD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Diploma',
                'code' => 'DM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        // Insert the data into the 'course_category' table
        DB::table('course_category')->insert($categories);
        
    }
}
