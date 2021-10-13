<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\OfficeFacilities;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFacilitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OfficeFacilities::class;

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
            'jenis_fasilitas' => $this->faker->text(255),
            'jenis_pemberian' => $this->faker->text(255),
            'nilai_perolehan' => $this->faker->text(255),
            'date' => $this->faker->date,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
