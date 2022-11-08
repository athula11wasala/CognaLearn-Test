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
            'name' => $this->faker->name,
            'course_code' => $this->faker->uuid(),
            'description' => $this->faker->name,
            'start_date' => $this->faker->date('2023-10-23'),
            'end_date' => $this->faker->date('2023-12-24'),
          ];
    }
}
