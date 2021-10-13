<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ServiceHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'emp_no' => $this->faker->text(255),
            'emoloyee_name' => $this->faker->text(255),
            'start_date' => $this->faker->date,
            'type' => $this->faker->word,
            'company_home_id' => \App\Models\CompanyHome::factory(),
            'company_host_id' => \App\Models\CompanyHost::factory(),
            'band_position_id' => \App\Models\BandPosition::factory(),
            'job_title_id' => \App\Models\JobTitle::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
