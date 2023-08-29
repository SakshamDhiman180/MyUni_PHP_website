<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegesTableTESTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of colleges you want to create
        $numberOfColleges = 5;
        $streams = ['Computer Science', 'Arts', 'Law', 'Engineering', 'Medical'];
        $dummyNames = ['Harmony University', 'Evergreen College', 'Sunrise Institute', 'Pioneer University', 'Goldenstats College'];
        
        for ($i = 1; $i <= $numberOfColleges; $i++) {
            College::insert([
                'banner_image' => 'college-banner-image/college-0' . $i . '.jpg',
                'name' => $dummyNames[$i - 1], 
                'description' => "Description for {$dummyNames[$i - 1]}",
                'streams' => json_encode([$streams[$i - 1]]),
                'code' => "COLLEGE{$i}",
                'address' => "Address {$i}",
                'city' => "City {$i}",
                'state' => "State {$i}",
                'zip' => "ZIP{$i}",
                'contact_number' => "123456789{$i}",
                'email' => "college{$i}@example.com",
                'principal_name' => "Principal {$i}",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
