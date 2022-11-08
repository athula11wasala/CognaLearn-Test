<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->name,
            'lname' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->PhoneNumber

          ];

     }
}
