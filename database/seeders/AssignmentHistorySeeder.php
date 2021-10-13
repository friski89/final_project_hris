<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssignmentHistory;

class AssignmentHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssignmentHistory::factory()
            ->count(5)
            ->create();
    }
}
