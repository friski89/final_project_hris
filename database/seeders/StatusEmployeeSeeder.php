<?php

namespace Database\Seeders;

use App\Models\StatusEmployee;
use Illuminate\Database\Seeder;

class StatusEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusEmployee::factory()
            ->count(5)
            ->create();
    }
}
