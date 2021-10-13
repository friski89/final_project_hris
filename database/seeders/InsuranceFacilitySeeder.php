<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InsuranceFacility;

class InsuranceFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InsuranceFacility::factory()
            ->count(5)
            ->create();
    }
}
