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
            'status' => $this->faker->randomElement(['on progress', 'finished']),
            'project_number' => mt_rand(200, 300),
            'project_name' => $this->faker->word,
            'project_location' => $this->faker->city . ", " . $this->faker->country,
            'project_manager' => $this->faker->name,
            'client' => $this->faker->company,
            'project_start' => $this->faker->date(),
            'project_finish' => $this->faker->date(),
            'sector' => 'nickel, power, coal, oil_gas, tin',
            'service' => 'feasibility_study',
            'project_picture' => 'sample.jpg',
            'project_description' => '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, eveniet veniam possimus ad aliquam consectetur?&nbsp;<br>Delectus officiis reiciendis pariatur nesciunt ab iusto placeat minus omnis labore laborum, in, v<br>eniam numquam esse voluptate adipisci.</div><ul><li>satu</li><li>dua</li><li>tiga</li><li>empat</li></ul>',
            // 'project_description' => $this->faker->paragraph,

        ];
    }
}


