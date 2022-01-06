<?php

namespace Database\Seeders;

use App\Models\CompanyHost;
use Illuminate\Database\Seeder;

class CompanyHostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyHost::factory()
            ->count(5)
            ->create();
    }
}
