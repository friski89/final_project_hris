<?php

namespace Database\Seeders;

use App\Models\JobGrade;
use Illuminate\Database\Seeder;

class JobGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobGrade::factory()
            ->count(5)
            ->create();
    }
}
