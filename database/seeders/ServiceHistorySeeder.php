<?php

namespace Database\Seeders;

use App\Models\ServiceHistory;
use Illuminate\Database\Seeder;

class ServiceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceHistory::factory()
            ->count(5)
            ->create();
    }
}
