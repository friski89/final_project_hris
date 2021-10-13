<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TrainingHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainingHistory::class;

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
            'training_name' => $this->faker->text(255),
            'institution' => $this->faker->text(255),
            'start_date' => $this->faker->date,
            'years_of_training' => $this->faker->text(255),
            'training_duration' => $this->faker->text(255),
            'end_date' => $this->faker->date,
            'training_force' => $this->faker->text(255),
            'rating' => $this->faker->text(255),
            'trnevent_topic' => $this->faker->text(255),
            'trncourse_cost' => $this->faker->text(255),
            'trnevent_type' => $this->faker->text(255),
            'trn_flag' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'other_competencies_id' => \App\Models\OtherCompetencies::factory(),
            'competence_fanctional_id' => \App\Models\CompetenceFanctional::factory(),
            'competence_leadership_id' => \App\Models\CompetenceLeadership::factory(),
            'competence_core_value_id' => \App\Models\CompetenceCoreValue::factory(),
        ];
    }
}
