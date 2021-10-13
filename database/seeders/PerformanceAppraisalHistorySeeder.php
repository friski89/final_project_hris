<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerformanceAppraisalHistory;

class PerformanceAppraisalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PerformanceAppraisalHistory::factory()
            ->count(5)
            ->create();
    }
}
