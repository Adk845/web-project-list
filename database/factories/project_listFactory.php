<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class project_listFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_number' => mt_rand(200, 300),
            'project_location' => $this->faker->city . ", " . $this->faker->country,
            'project_manager' => $this->faker->name,
            'client' => $this->faker->company,
            'project_start' => $this->faker->date(),
            'project_finish' => $this->faker->date(),
            'sector' => $this->faker->word,
            'service' => $this->faker->word,
            'project_picture' => 'sample.jpg',
            'project_description' => $this->faker->paragraph,

        ];
    }
}
