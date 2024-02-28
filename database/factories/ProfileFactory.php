<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'about' => $this->faker->paragraph,
            'phone' => $this->faker->numerify('(##) #####-####'),
            // 'phone' => $this->faker->phoneNumber,
            // 'phone' => $this->faker->randomNumber(15),
            'social_networks' => 'instagram-twitter',
        ];
    }
}
