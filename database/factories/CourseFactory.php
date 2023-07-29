<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
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
            'instructor_id' => $this->faker->randomNumber(1, 10),
            'category_id' => $this->faker->randomNumber(1, 10),
            'description' => $this->faker->paragraph(),
            'summary' => $this->faker->paragraphs(2, true)
        ];
    }
}
