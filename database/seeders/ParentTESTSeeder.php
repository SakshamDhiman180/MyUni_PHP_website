<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentTESTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('parents')->insert([
            'first_name' => 'Tony',
            'last_name' => 'Stark',
            'email' => 'tony@gmail.com',
            'course_id' => 1, 
            'college_id' => 2, 
            'exam_id' => 3, 
            'password' => Hash::make('1234567890'),
            'status' => 'active',
            'profile_image' => 'path/to/profile/image.jpg',
            'phone' => 1234567890, 
            'street' => '123 Main St',
            'country_id' => 1, 
            'state_id' => 1, 
            'city_id' => 1, 
            'zip_code' => '12345',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
