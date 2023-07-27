<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('11111111'),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'dob' => $this->faker->date(),
            'profile' => $this->faker->image()
        ];
    }
}
