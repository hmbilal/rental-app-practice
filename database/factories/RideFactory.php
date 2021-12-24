<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hourly_rate' => $this->faker->numerify('##.#'),
            'day_rate' => $this->faker->numerify('##.#'),
            'no_of_doors' => 4,
            'is_active' => $this->faker->boolean,
        ];
    }
}
