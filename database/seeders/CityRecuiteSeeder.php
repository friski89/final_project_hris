<?php

namespace Database\Seeders;

use App\Models\CityRecuite;
use Illuminate\Database\Seeder;

class CityRecuiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityRecuite::factory()
            ->count(5)
            ->create();
    }
}
