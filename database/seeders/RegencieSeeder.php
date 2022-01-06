<?php

namespace Database\Seeders;

use App\Models\Regencie;
use Illuminate\Database\Seeder;

class RegencieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regencie::factory()
            ->count(5)
            ->create();
    }
}
