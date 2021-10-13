<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AchievementHistory;

class AchievementHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AchievementHistory::factory()
            ->count(5)
            ->create();
    }
}
