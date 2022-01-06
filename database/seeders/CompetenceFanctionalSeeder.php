<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetenceFanctional;

class CompetenceFanctionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompetenceFanctional::factory()
            ->count(5)
            ->create();
    }
}
