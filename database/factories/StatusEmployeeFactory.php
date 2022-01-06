<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StatusEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StatusEmployee::class;

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
