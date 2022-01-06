<?php

namespace Database\Seeders;

use App\Models\CashBenefit;
use Illuminate\Database\Seeder;

class CashBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CashBenefit::factory()
            ->count(5)
            ->create();
    }
}
