<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define directory paths
        $sourceDir = public_path('assets/img/home-1/testimonial');
        $destDir = public_path('uploads/testimonials');

        // Create destination directory if it doesn't exist
        if (!File::exists($destDir)) {
            File::makeDirectory($destDir, 0755, true);
        }

        // Copy source images if they exist
        $sohelImage = null;
        if (File::exists($sourceDir . '/client.png')) {
            File::copy($sourceDir . '/client.png', $destDir . '/client_sohel.png');
            $sohelImage = 'client_sohel.png';
        }

        $ayeshaImage = null;
        if (File::exists($sourceDir . '/client-2.png')) {
            File::copy($sourceDir . '/client-2.png', $destDir . '/client_ayesha.png');
            $ayeshaImage = 'client_ayesha.png';
        }

        $kabirImage = null;
        if (File::exists($sourceDir . '/client-3.png')) {
            File::copy($sourceDir . '/client-3.png', $destDir . '/client_kabir.png');
            $kabirImage = 'client_kabir.png';
        }

        // Create seed data
        Testimonial::create([
            'name' => 'Sohel Tanvir',
            'destination' => 'Canada Student Visa',
            'stars' => 5,
            'quote' => 'Professional and reliable service. They explained each step clearly, prepared my documents, and supported me during the interview. My visa approval came faster than expected.',
            'image' => $sohelImage,
            'status' => true,
        ]);

        Testimonial::create([
            'name' => 'Ayesha Rahman',
            'destination' => 'UK Student Visa',
            'stars' => 5,
            'quote' => 'The consultancy guided me from start to finish, making my study abroad journey smooth and stress-free. Thanks to their expert support, I secured my visa successfully.',
            'image' => $ayeshaImage,
            'status' => true,
        ]);

        Testimonial::create([
            'name' => 'Kabir Sharma',
            'destination' => 'USA Student Visa',
            'stars' => 5,
            'quote' => 'Excellent guidance and prompt responses. They helped me choose the right university and sorted out all my financial proofs. Highly recommended for study abroad aspirants!',
            'image' => $kabirImage,
            'status' => true,
        ]);
    }
}
