<?php

namespace Database\Factories;

use App\Models\JobGrade;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobGradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobGrade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
