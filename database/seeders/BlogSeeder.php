<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Blog::create([
            'name' => 'Canada Updates Express Entry Requirements',
            'category' => 'Immigration News',
            'shortdescription' => 'Significant changes announced for Express Entry candidates in the latest update.',
            'description' => 'The IRCC has released new guidelines regarding Proof of Funds and CRS score calculations for upcoming draws.',
            'image1' => 'blog_1.png',
            'last_updated' => now(),
            'status' => 'published',
            'writtenby' => 'Expert Consultant',
            'visible' => 1,
            'blogurl' => 'canada-express-entry-update',
        ]);

        \App\Models\Blog::create([
            'name' => 'How to Prepare for your Visa Interview',
            'category' => 'Tips & Advice',
            'shortdescription' => 'Essential tips to help you succeed in your embassy interview.',
            'description' => 'Preparation is key to a successful visa interview. We break down the most common questions and how to answer them.',
            'image1' => 'blog_1.png',
            'last_updated' => now(),
            'status' => 'published',
            'writtenby' => 'Visa Team',
            'visible' => 1,
            'blogurl' => 'visa-interview-tips',
        ]);
    }
}
