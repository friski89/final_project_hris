<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'phone_number' => $this->faker->phoneNumber,
            'blood_group' => 'Tidak Tahu',
            'no_ktp' => $this->faker->text(30),
            'no_npwp' => $this->faker->text(30),
            'address_ktp' => $this->faker->text,
            'address_domisili' => $this->faker->text,
            'status_domisili' => 'Rumah Sendiri',
            'address_npwp' => $this->faker->text(255),
            'nama_ibu' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'religion_id' => \App\Models\Religion::factory(),
        ];
    }
}
