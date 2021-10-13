<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EmergencyContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmergencyContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmergencyContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'contact' => $this->faker->text(255),
            'relation' => $this->faker->text(255),
            'profile_id' => \App\Models\Profile::factory(),
        ];
    }
}
