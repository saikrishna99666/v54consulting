<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Subscriber::create(['email' => 'user1@example.com']);
        \App\Models\Subscriber::create(['email' => 'user2@example.com']);
    }
}
