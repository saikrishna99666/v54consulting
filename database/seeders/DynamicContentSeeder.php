<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DynamicContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            \App\Models\DynamicContent::updateOrCreate(
                ['id' => $i],
                [
                    'companyname' => 'Visaway Immigration',
                    'email' => 'info@visaway.com',
                    'phone_number' => '+1234567890',
                    'address' => 'Sample Address, City, Country',
                    'facebook_link' => 'https://facebook.com',
                    'twitter_link' => 'https://twitter.com',
                    'linkedin_link' => 'https://linkedin.com',
                    'instagram_link' => 'https://instagram.com',
                    'operating_hours' => 'Mon-Fri: 9am - 6pm',
                    'copyrightyear' => date('Y'),
                    'notification_email' => 'admin@visaway.com',
                    'about_subtitle' => 'About Our Consultancy',
                    'about_title' => 'Turning Study Abroad Dreams Into Reality',
                    'about_short_description' => 'We guide students with expert visa consulting, ensuring a smooth process from application to approval, turning study abroad aspirations into life-changing opportunities for a brighter future.',
                    'about_long_description' => 'We guide students with expert visa consulting, ensuring a smooth process from application to approval, turning study abroad aspirations into life-changing opportunities for a brighter future.',
                    'about_point_1' => 'Fastest Visa form processing with skilled immigration agents',
                    'about_point_2' => 'Partnership with International Educational Institutions',
                ]
            );
        }
    }
}
