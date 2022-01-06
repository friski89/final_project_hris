<?php

namespace Database\Factories;

use App\Models\Regencie;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegencieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Regencie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'province_id' => \App\Models\Province::factory(),
        ];
    }
}
