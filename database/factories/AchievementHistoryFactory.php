<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AchievementHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AchievementHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AchievementHistory::class;

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
            'award_name' => $this->faker->text(255),
            'date' => $this->faker->date,
            'institution' => $this->faker->text(255),
            'no_sk' => $this->faker->text(255),
            'office_name' => $this->faker->text(255),
            'position_name' => $this->faker->text(255),
            'remarks' => $this->faker->text,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
