<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->bothify('?????-#####'),
            'price' => $this->faker->randomNumber(5, true),
            'stock' => $this->faker->randomDigitNotNull()
        ];
    }
}
