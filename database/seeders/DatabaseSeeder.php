<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            DynamicContentSeeder::class,
            ServiceSeeder::class,
            BlogSeeder::class,
            FaqSeeder::class,
            TeamSeeder::class,
            CarouselSeeder::class,
            TickerSeeder::class,
            SubscriberSeeder::class,
            BranchSeeder::class,
            SeoSettingSeeder::class,
        ]);
    }
}
