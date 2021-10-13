<?php

namespace Database\Seeders;

use App\Models\SubStatus;
use Illuminate\Database\Seeder;

class SubStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubStatus::factory()
            ->count(5)
            ->create();
    }
}
