<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\AboutUs::updateOrCreate(
            ['id' => 1],
            [
                'subtitle' => 'About Our Consultancy',
                'title' => 'Turning Study Abroad Dreams Into Reality',
                'short_description' => 'We guide students with expert visa consulting, ensuring a smooth process from application to approval, turning study abroad aspirations into life-changing opportunities for a brighter future.',
                'points' => [
                    'Fastest Visa form processing with skilled immigration agents',
                    'Partnership with International Educational Institutions',
                    'Expert guidance from certified consultants',
                ],
                'button_text' => 'Get Started',
                'button_link' => '/about',
            ]
        );
    }
}
