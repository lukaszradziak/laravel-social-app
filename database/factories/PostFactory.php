<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hashtags = ' ';
        for ($i = 0; $i < rand(0, 5); $i++) {
            $hashtags .= '#' . $this->faker->word() . ' ';
        }

        return [
            'content' => $this->faker->paragraph() . $hashtags,
            'created_at' => $this->faker->dateTimeBetween('-1 week', '+0 week')
        ];
    }
}
