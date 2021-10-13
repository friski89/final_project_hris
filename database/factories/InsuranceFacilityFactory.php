<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\InsuranceFacility;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsuranceFacilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InsuranceFacility::class;

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
            'jenis_asuransi' => $this->faker->text(255),
            'provider_asuransi' => $this->faker->text(255),
            'nama_peserta' => $this->faker->text(255),
            'status_peserta' => $this->faker->text(255),
            'date' => $this->faker->date,
            'peserta_manfaat' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
