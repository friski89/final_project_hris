<?php

namespace Database\Seeders;

use App\Models\BandPosition;
use Illuminate\Database\Seeder;

class BandPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BandPosition::factory()
            ->count(5)
            ->create();
    }
}
