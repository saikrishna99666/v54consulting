<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'count_number' => '1',
                'suffix' => 'k+',
                'title' => 'Students Guided',
                'description' => 'Successfully assisted over a thousand students worldwide.',
            ],
            [
                'count_number' => '50',
                'suffix' => '+',
                'title' => 'Countries Covered',
                'description' => 'Helping students apply to universities in more than 50 countries.',
            ],
            [
                'count_number' => '95',
                'suffix' => '%',
                'title' => 'Visa Success Rate',
                'description' => 'Inspired students to reach their goals globally',
            ],
            [
                'count_number' => '10',
                'suffix' => '+',
                'title' => 'Years of Experience',
                'description' => 'Trusted experts in global education consulting.',
            ],
        ];

        foreach ($achievements as $achievement) {
            \App\Models\Achievement::create($achievement);
        }
    }
}
