<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'todo' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'deadline' => $this->faker->date(),
            'progress' => $this->faker->numberBetween(0, 100)
        ];
    }
}
