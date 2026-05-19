<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Faq::create([
            'question' => 'How long does a student visa take?',
            'answer' => 'Typically, student visas take between 4 to 12 weeks depending on the country and your profile.',
        ]);

        \App\Models\Faq::create([
            'question' => 'What is the Express Entry CRS score?',
            'answer' => 'The Comprehensive Ranking System (CRS) is a points-based system used to assess and score your profile.',
        ]);

        \App\Models\Faq::create([
            'question' => 'Can I work while studying on a visa?',
            'answer' => 'Most countries including Canada and UK allow students to work part-time (typically 20 hours/week).',
        ]);
    }
}
