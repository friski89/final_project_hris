<?php

namespace Database\Seeders;

use App\Models\Edu;
use Illuminate\Database\Seeder;

class EduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Edu::factory()
            ->count(5)
            ->create();
    }
}
