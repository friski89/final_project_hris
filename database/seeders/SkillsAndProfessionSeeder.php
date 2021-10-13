<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillsAndProfession;

class SkillsAndProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkillsAndProfession::factory()
            ->count(5)
            ->create();
    }
}
