<?php

namespace Database\Seeders;

use App\Models\CompanyHome;
use Illuminate\Database\Seeder;

class CompanyHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyHome::factory()
            ->count(5)
            ->create();
    }
}
