<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    public function run()
    {
        // Main Categories
        $studyDestinations = ServiceCategory::create(['name' => 'Study Destinations']);
        $services = ServiceCategory::create(['name' => 'Services']);

        // Subcategories for Study Destinations
        $destinations = [
            'Study in UK',
            'Study in USA',
            'Study in Canada',
            'Study in Australia',
            'Study in Germany',
            'Study in France',
            'Study in Ireland',
        ];

        foreach ($destinations as $name) {
            ServiceCategory::create([
                'name' => $name,
                'parent_id' => $studyDestinations->id
            ]);
        }

        // Subcategories for Services
        $serviceList = [
            'Student Visa',
            'Work Visa',
            'PR Services',
            'Course Selection',
            'University Admissions',
            'Scholarship Guidance',
        ];

        foreach ($serviceList as $name) {
            ServiceCategory::create([
                'name' => $name,
                'parent_id' => $services->id
            ]);
        }
    }
}
