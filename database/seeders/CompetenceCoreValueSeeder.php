<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetenceCoreValue;

class CompetenceCoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompetenceCoreValue::factory()
            ->count(5)
            ->create();
    }
}
