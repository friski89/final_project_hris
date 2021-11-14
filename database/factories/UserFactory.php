<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->name,
            'email' => $this->faker->email,
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'remember_token' => Str::random(10),
            'nik_telkom' => $this->faker->text(255),
            'nik_company' => $this->faker->text(255),
            'date_in' => $this->faker->date,
            'date_sk' => $this->faker->date,
            'place_of_birth' => $this->faker->text(150),
            'date_of_birth' => $this->faker->date,
            'age' => $this->faker->randomNumber(0),
            'tanggal_kartap' => $this->faker->date,
            'no_sk_kartap' => $this->faker->text(255),
            'band_position_id' => \App\Models\BandPosition::factory(),
            'job_grade_id' => \App\Models\JobGrade::factory(),
            'job_family_id' => \App\Models\JobFamily::factory(),
            'job_function_id' => \App\Models\JobFunction::factory(),
            'city_recuite_id' => \App\Models\CityRecuite::factory(),
            'status_employee_id' => \App\Models\StatusEmployee::factory(),
            'company_home_id' => \App\Models\CompanyHome::factory(),
            'company_host_id' => \App\Models\CompanyHost::factory(),
            'sub_status_id' => \App\Models\SubStatus::factory(),
            'unit_id' => \App\Models\Unit::factory(),
            'division_id' => \App\Models\Division::factory(),
            'work_location_id' => \App\Models\WorkLocation::factory(),
            'job_title_id' => \App\Models\JobTitle::factory(),
            'edu_id' => \App\Models\Edu::factory(),
            'direktorat_id' => \App\Models\Direktorat::factory(),
            'departement_id' => \App\Models\Departement::factory(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
