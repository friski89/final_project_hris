<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CompetenceCoreValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetenceCoreValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompetenceCoreValue::class;

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
