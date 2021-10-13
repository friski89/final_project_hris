<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AssignmentHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssignmentHistory::class;

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
            'date' => $this->faker->date,
            'company_home_id' => \App\Models\CompanyHome::factory(),
            'job_title_id' => \App\Models\JobTitle::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
