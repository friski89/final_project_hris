<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ContractHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContractHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal' => $this->faker->date,
            'status' => $this->faker->word,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
