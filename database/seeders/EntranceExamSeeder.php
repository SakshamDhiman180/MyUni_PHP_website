<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EntranceExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('entrance_exams')->insert([
                'admission_year' => $faker->year,
                'name' => $faker->sentence(3),
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                'code' => $faker->unique()->randomNumber(4),
                'course_id' => $faker->numberBetween(1, 5), 
                'college_id'=> $faker->numberBetween(1, 5), 
                'exam_date' => $faker->date('Y-m-d'),
                'registration_start_date' => $faker->date('Y-m-d'),
                'reg_last_date' => $faker->date('Y-m-d'),
                'fee' => $faker->randomFloat(2, 50, 500),
                'result_date' => $faker->date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
