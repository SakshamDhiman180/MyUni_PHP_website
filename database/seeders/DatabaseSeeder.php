<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            AdminUserSeeder::class,
            StreamsTableTESTSeeder::class,
            CourseCategorySeeder::class,
            CoursesTableTESTSeeder::class,
            CollegesTableTESTSeeder::class,
            EntranceExamSeeder::class,
            CollegeCoursesTESTTableSeeder::class,
            ParentTESTSeeder::class,
        ]);
    }
}
