<?php

namespace Database\Seeders;

use App\Models\AlamatKerja;
use Illuminate\Database\Seeder;

class AlamatKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlamatKerja::factory()
            ->count(5)
            ->create();
    }
}
