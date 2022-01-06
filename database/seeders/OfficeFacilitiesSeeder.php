<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OfficeFacilities;

class OfficeFacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfficeFacilities::factory()
            ->count(5)
            ->create();
    }
}
