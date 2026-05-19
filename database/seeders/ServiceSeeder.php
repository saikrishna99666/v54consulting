<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'Serviceid' => 1,
                'ServicesTitle' => 'Student Visa',
                'ServicesText' => 'Comprehensive guidance for students wishing to study abroad in Canada, UK, Australia, and more.',
                'pagecategory' => 'Study',
                'serviceimage' => 'student_visa.png',
                'icon' => 'student_visa.png',
                'servicesUrl' => 'student-visa',
                'status' => 1,
            ],
            [
                'Serviceid' => 2,
                'ServicesTitle' => 'Permanent Residency',
                'ServicesText' => 'Expert assistance for Express Entry, PNP, and other permanent residency pathways.',
                'pagecategory' => 'Immigration',
                'serviceimage' => 'pr_visa.png',
                'icon' => 'pr_visa.png',
                'servicesUrl' => 'permanent-residency',
                'status' => 1,
            ],
            [
                'Serviceid' => 3,
                'ServicesTitle' => 'Work Permit',
                'ServicesText' => 'Helping skilled workers obtain LMIA-supported and open work permits for various countries.',
                'pagecategory' => 'Work',
                'serviceimage' => 'work_permit.png',
                'icon' => 'work_permit.png',
                'servicesUrl' => 'work-permit',
                'status' => 1,
            ],
        ];

        foreach ($services as $s) {
            $service = \App\Models\Services::create($s);
            
            // Add some gallery images for each service
            for ($i = 1; $i <= 2; $i++) {
                \App\Models\ServiceGallery::create([
                    'Serviceid' => $service->Serviceid,
                    'image' => $s['serviceimage'], // Reusing main image as sample
                    'caption' => 'Sample Gallery Image ' . $i,
                ]);
            }
        }
    }
}
