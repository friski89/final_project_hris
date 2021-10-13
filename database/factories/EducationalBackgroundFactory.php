<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EducationalBackground;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationalBackgroundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EducationalBackground::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'emp_no' => $this->faker->text(100),
            'employee_name' => $this->faker->text(100),
            'institution_name' => $this->faker->text(255),
            'faculty' => $this->faker->text(255),
            'major' => $this->faker->text(255),
            'graduate_date' => $this->faker->date,
            'cost_category' => $this->faker->text(255),
            'scholarship_institution' => $this->faker->text(255),
            'gpa' => $this->faker->text(255),
            'gpa_scale' => $this->faker->text(255),
            'default' => $this->faker->text(255),
            'start_year' => $this->faker->date,
            'city' => $this->faker->text(255),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'user_id' => \App\Models\User::factory(),
            'edu_id' => \App\Models\Edu::factory(),
        ];
    }
}
