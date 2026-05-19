<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Carousel::truncate();

        \App\Models\Carousel::create([
            'subtitle' => 'Global Education Simplified',
            'title' => 'From Application to Visa – We’ve Got You Covered',
            'description' => 'We guide you through every step of the education visa process, from initial application to final approval, ensuring a smooth, hassle-free journey.',
            'button_text' => 'Apply now',
            'button_link' => '/contact',
            'link' => 'https://www.youtube.com/watch?v=Cn4G2lZ_g2I', // Video link
            'image_url' => 'assets/img/hero/hero_student_visa.png',
        ]);

        \App\Models\Carousel::create([
            'subtitle' => 'Expert Visa Consultancy',
            'title' => 'Your Bridge to International Education',
            'description' => 'Join thousands of successful students who have achieved their dreams with our professional guidance and support.',
            'button_text' => 'Get Started',
            'button_link' => '/contact',
            'link' => '/services', // Page link
            'image_url' => 'assets/img/hero/hero_global_travel.png',
        ]);
    }
}
