<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BandPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class BandPositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BandPosition::class;

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
