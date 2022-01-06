<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OtherCompetencies;

class OtherCompetenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OtherCompetencies::factory()
            ->count(5)
            ->create();
    }
}
