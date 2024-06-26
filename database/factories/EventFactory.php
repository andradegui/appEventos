<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence;
        
        return [
            'title' => $name,
            'description' => $this->faker->words(7, true),
            'body' => $this->faker->paragraph(2),
            'start_event' => now(),
            'slug' => Str::slug($name)
        ];
    }
}
