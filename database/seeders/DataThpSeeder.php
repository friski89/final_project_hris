<?php

namespace Database\Seeders;

use App\Models\DataThp;
use Illuminate\Database\Seeder;

class DataThpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataThp::factory()
            ->count(5)
            ->create();
    }
}
