<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CompetenceFanctional;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetenceFanctionalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompetenceFanctional::class;

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
