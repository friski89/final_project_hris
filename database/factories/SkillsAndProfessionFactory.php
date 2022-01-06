<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\SkillsAndProfession;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillsAndProfessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SkillsAndProfession::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'certificate_name' => $this->faker->text(255),
            'institution' => $this->faker->text(255),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'user_id' => \App\Models\User::factory(),
            'other_competencies_id' => \App\Models\OtherCompetencies::factory(),
            'competence_fanctional_id' => \App\Models\CompetenceFanctional::factory(),
            'competence_leadership_id' => \App\Models\CompetenceLeadership::factory(),
            'competence_core_value_id' => \App\Models\CompetenceCoreValue::factory(),
        ];
    }
}
