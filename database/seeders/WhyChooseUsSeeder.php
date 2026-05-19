<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\WhyChooseUs::updateOrCreate(['id' => 1], [
            'subtitle' => 'Why Choose Us',
            'title' => 'Your Immigration for Success Partner',
            'description' => 'We are your trusted immigration partner, providing expert guidance, personalized solutions, and reliable support throughout the visa and immigration process to ensure smooth, successful, and stress-free journeys abroad.',
            
            // Mission
            'mission_title' => 'Our Mission',
            'mission_description' => 'Our mission is to provide expert immigration guidance, personalized support, and transparent solutions, ensuring smooth, successful.',
            'mission_points' => [
                'Fastest Working Process',
                'Expert Support Panel',
                'Expertise visa Processing',
                'Global Network'
            ],
            
            // Vision
            'vision_title' => 'Our Vision',
            'vision_description' => 'Our mission is to provide expert immigration guidance, personalized support, and transparent solutions, ensuring smooth, successful.', // Default from static
            'vision_points' => [
                'Fastest Working Process',
                'Expert Support Panel',
                'Expertise visa Processing',
                'Global Network'
            ],
            
            'experience_years' => '20',
            'button_text' => 'Get Started Today',
            'button_link' => '/contact',
            'phone' => '+01 567 114 3312',
            'image_1' => '06.png',
            'image_2' => '07.png',
        ]);
    }
}
