<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetenceLeadership;

class CompetenceLeadershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompetenceLeadership::factory()
            ->count(5)
            ->create();
    }
}
