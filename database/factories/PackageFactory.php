<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
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

            'name' => $this->faker->name();
            'min_amount' => $this->faker->numberBetween(10, 1000);
            'max_amount' => $this->faker->numberBetween(10000, 1000000);
            'start_date' => $this->faker->date();
            'end_date' =>  $this->faker->date();
        ];
    }
}
