<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'summary' => $this->faker->paragraphs(2, true),
            'course_id' => $this->faker->randomNumber(1, 20),
        ];
    }
}
