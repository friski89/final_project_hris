<?php

namespace Database\Factories;

use App\Models\CashBenefit;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CashBenefitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CashBenefit::class;

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
            'jenis_benefit' => $this->faker->text(255),
            'nilai_benefit' => $this->faker->text(255),
            'date' => $this->faker->date,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
