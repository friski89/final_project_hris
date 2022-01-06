<?php

namespace Database\Factories;

use App\Models\Religion;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReligionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Religion::class;

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
