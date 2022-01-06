<?php

namespace Database\Factories;

use App\Models\Family;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Family::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_name' => $this->faker->text(255),
            'emp_no' => $this->faker->text(255),
            'marital_status' => 'Menikah',
            'no_kk' => $this->faker->text(255),
            'family_name' => $this->faker->text(255),
            'nik_id' => $this->faker->text(255),
            'place_of_birth' => $this->faker->text(255),
            'date_of_birth' => $this->faker->date,
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'date_marital' => $this->faker->date,
            'religion' => 'Islam',
            'citizenship' => $this->faker->text(255),
            'work' => $this->faker->text(255),
            'health_status' => $this->faker->randomNumber(0),
            'blood_group' => 'Tidak Tahu',
            'blood_rhesus' => $this->faker->text(255),
            'house_number' => $this->faker->text(255),
            'handphone_number' => $this->faker->text(255),
            'emergency_number' => $this->faker->text(255),
            'address' => $this->faker->text,
            'city' => $this->faker->city,
            'province' => $this->faker->text(255),
            'postal_code' => $this->faker->text(255),
            'relationship' => 'Suami',
            'alive' => $this->faker->randomNumber(0),
            'urutan' => $this->faker->randomNumber(0),
            'dependent_status' => $this->faker->randomNumber(0),
            'user_id' => \App\Models\User::factory(),
            'edu_id' => \App\Models\Edu::factory(),
        ];
    }
}
