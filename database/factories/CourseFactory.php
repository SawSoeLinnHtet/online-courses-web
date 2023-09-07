<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'instructor_id' => $this->faker->randomNumber(1, 10),
            'description' => $this->faker->paragraph(),
            'summary' => $this->faker->paragraphs(2, true)
        ];
    }
}
