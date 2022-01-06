<?php

namespace Database\Factories;

use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VillageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Village::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'kode_pos' => $this->faker->text(255),
            'district_id' => \App\Models\District::factory(),
        ];
    }
}
