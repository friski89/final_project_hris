<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingHistory;

class TrainingHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingHistory::factory()
            ->count(5)
            ->create();
    }
}
