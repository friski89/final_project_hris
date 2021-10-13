<?php

namespace Database\Factories;

use App\Models\DataThp;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataThpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataThp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'emp_no' => $this->faker->text(255),
            'employee_name' => $this->faker->text(255),
            'base_salary' => $this->faker->randomNumber,
            'tunjangan_jabatan' => $this->faker->randomNumber,
            'tunjangan_fixed' => $this->faker->randomNumber,
            'based_jamsostek' => $this->faker->randomNumber,
            'no_jamsostek' => $this->faker->text(255),
            'no_bpjs' => $this->faker->text(255),
            'no_npwp' => $this->faker->randomNumber,
            'status_pajak' => $this->faker->randomNumber(0),
            'no_rekening' => $this->faker->randomNumber,
            'nama_bank' => $this->faker->text(255),
            'nama_pemilik' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
