<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationalBackground;

class EducationalBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EducationalBackground::factory()
            ->count(5)
            ->create();
    }
}
