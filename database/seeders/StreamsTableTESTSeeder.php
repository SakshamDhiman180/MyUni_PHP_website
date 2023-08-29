<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamsTableTESTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of streams you want to create
        $streams = [
            [
                'name' => 'Computer Science',
                'description' => 'Description for Computer Science',
                'code' => 'CS',
            ],
            [
                'name' => 'Arts',
                'description' => 'Description for Arts',
                'code' => 'ARTS',
            ],
            [
                'name' => 'Law',
                'description' => 'Description for Law',
                'code' => 'LAW',
            ],
            [
                'name' => 'Engineering',
                'description' => 'Description for Engineering',
                'code' => 'ENG',
            ],
            [
                'name' => 'Medical',
                'description' => 'Description for Medical',
                'code' => 'MED',
            ],
        ];
        
        foreach ($streams as $streamData) {
            DB::table('streams')->insert([
                'name' => $streamData['name'],
                'description' => $streamData['description'],
                'code' => $streamData['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
