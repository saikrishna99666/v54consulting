<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\team::create([
            'name' => 'John Doe',
            'qualification' => 'RCIC Certified Consultant',
            'description' => 'Specializing in Express Entry and PR pathways.',
            'status' => 1,
        ]);

        \App\Models\team::create([
            'name' => 'Jane Smith',
            'qualification' => 'Education Counselor',
            'description' => 'Helping students find the best universities abroad.',
            'status' => 1,
        ]);
    }
}
