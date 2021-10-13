<?php

namespace Database\Seeders;

use App\Models\Direktorat;
use Illuminate\Database\Seeder;

class DirektoratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direktorat::factory()
            ->count(5)
            ->create();
    }
}
