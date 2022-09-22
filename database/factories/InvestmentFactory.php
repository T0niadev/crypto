<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvestmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => $this->faker->numberBetween(0, 1),
            'package_id' => $this->faker->numberBetween(0, 1),
            'user_id' => $this->faker->numberBetween(0, 1),
            'amount' => $this->faker->numberBetween(10, 10000),
            'total_return' => $this->faker->numberBetween(10, 10000),
            'package_data' => $this->faker->realText(10, 1000),
        ];
    }
}