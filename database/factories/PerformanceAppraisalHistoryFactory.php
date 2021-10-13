<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PerformanceAppraisalHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerformanceAppraisalHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerformanceAppraisalHistory::class;

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
            'year' => $this->faker->year,
            'performance_value' => $this->faker->text(255),
            'performance_score' => $this->faker->text(255),
            'competency_value' => $this->faker->text(255),
            'behavioral_value' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
