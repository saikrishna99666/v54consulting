<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Ticker::create([
            'title' => 'Breaking: New PR Draw announced for 2000 candidates!',
            'status' => 'active',
        ]);
        \App\Models\Ticker::create([
            'title' => 'Latest: UK Student Visa processing time reduced to 3 weeks.',
            'status' => 'active',
        ]);
    }
}
